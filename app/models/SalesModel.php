<?php

class SalesModel extends Model
{
    public function makePayment($reservationID)
    {
        $curDateTime = DateTimeExtended::getCurrentTimeStamp();
        $price = $this->getServicePriceByReservationID($reservationID);

        $results = $this->insert("paymentinvoices", [
            "reservationID" => $reservationID,
            "amount" => $price,
            "datetime" => $curDateTime,
            "handledReceptID" => Session::getUser("id"),
            "status" => 2
        ]);

        return $results;
    }

    public function createRefundInvoice($payInvoiceNo)
    {
        $curDateTime = DateTimeExtended::getCurrentTimeStamp();
        $amount = $this->getPayInvoiceAmount($payInvoiceNo);
        $results = $this->insert(
            "refundinvoices",
            [
                "paymentInvoiceNo" => $payInvoiceNo,
                "amount" => - ($amount),
                "handledReceptID" => Session::getUser("id"),
                "datetime" => $curDateTime,
                "status" => 1
            ]
        );
        return $results;
    }

    public function voidPaymentInvoice($invoiceNo)
    {
        $curDateTime = DateTimeExtended::getCurrentTimeStamp();
        $results = $this->update(
            "paymentinvoices",
            [
                "voidDateTime" => $curDateTime,
                "status" => 0
            ],
            [
                "paymentInvoiceNo" => $invoiceNo
            ]
        );
        return $results;
    }

    public function voidRefundInvoice($invoiceNo)
    {
        $curDateTime = DateTimeExtended::getCurrentTimeStamp();
        $results = $this->update(
            "refundinvoices",
            [
                "voidDateTime" => $curDateTime,
                "status" => 0
            ],
            [
                "refundInvoiceNo" => $invoiceNo
            ]
        );
        return $results;
    }

    public function getServicePriceByReservationID($reservationID)
    {
        $SQLstatement =
            "SELECT SER.price
            FROM reservations AS RES
            INNER JOIN services AS SER
            ON SER.serviceID = RES.serviceID
            WHERE RES.reservationID = :reservationID;";

        $results = $this->customQuery($SQLstatement, [":reservationID" => $reservationID]);
        $results = json_decode(json_encode($results[0]->price), true);
        return $results;
    }

    public function getReservationIDByPayInvoiceNo($payInvoiceNo)
    {
        $results = $this->getSingle("paymentinvoices", ["reservationID"], ["paymentInvoiceNo" => $payInvoiceNo]);

        return $results->reservationID;
    }

    private function getPayInvoiceAmount($invoiceNo)
    {
        $results = $this->getSingle(
            "paymentinvoices",
            ["amount"],
            ["paymentInvoiceNo" => $invoiceNo]
        );
        return $results->amount;
    }

    public function getAllInvoices()
    {
        $payInvoices = $this->getAllPaymentInvoices();
        $refInvoices = $this->getAllRefundInvoices();
        $inv = array_merge($payInvoices, $refInvoices);
        return $inv;
    }

    public function getInvoicesWithFilters($iType, $status)
    {
        if ($iType == "0")
        {
            if ($status == "all")
                $invoices = $this->getAllRefundInvoices();
            else
                $invoices = $this->getResultSet("refundinvoices", "*", ['status' => $status - 3]);
            foreach ($invoices as $key => $invoice)
            {
                $invoices[$key]->type = 0;
            }
        }
        else
        {
            if ($status == "all")
                $invoices = $this->getAllPaymentInvoices();
            else
                $invoices = $this->getResultSet("paymentinvoices", "*", ['status' => $status]);

            foreach ($invoices as $key => $invoice)
            {
                $invoices[$key]->type = 1;
            }
        }
        return $invoices;
    }

    public function getAllPaymentInvoices()
    {
        $results = $this->getResultSet("paymentinvoices", "*");
        foreach ($results as $key => $invoice)
        {
            $results[$key]->type = 1;
        }
        return $results;
    }

    public function getAllRefundInvoices()
    {
        $results = $this->getResultSet("refundinvoices", "*");
        foreach ($results as $key => $invoice)
        {
            $results[$key]->type = 0;
        }
        return $results;
    }

    // Returns payement invoice 
    // with reservation data
    // with refund invoice (if exists)
    public function getPayInvoice_ReservationData_RefundInvoice($payInvoiceNo)
    {
        $SQLstatement =
            "SELECT PI.paymentInvoiceNo,
                    PI.amount, 
                    PI.reservationID, 
                    PI.handledReceptID AS payRecept, 
                    PI.datetime AS payDateTime, 
                    PI.voidDateTime, 
                    PI.status,
                    RES.date AS resDate,
                    RES.startTime AS resTime,
                    SER.name,
                    STAFF.fName AS staffFName,
                    STAFF.lName AS staffLName,
                    RI.refundInvoiceNo,
                    RI.handledReceptID AS refRecept,
                    RI.datetime AS refDateTime
            FROM paymentinvoices AS PI
            INNER JOIN reservations AS RES
            ON RES.reservationID = PI.reservationID
            INNER JOIN services AS SER
            ON SER.serviceID = RES.serviceID
            INNER JOIN staff AS STAFF
            ON STAFF.staffID = RES.staffID
            INNER JOIN customers AS CUST
            ON CUST.customerID = RES.customerID
            LEFT JOIN refundinvoices AS RI
            ON RI.paymentInvoiceNo = PI.paymentInvoiceNo AND RI.status = 1
            WHERE PI.paymentInvoiceNo = :payInvoiceNo;";

        $results = $this->customQuery(
            $SQLstatement,
            [":payInvoiceNo" => $payInvoiceNo]
        );
        return $results[0];
    }

    public function getRefInvoice_ReservationData($refInvoiceNo)
    {
        $SQLstatement =
            "SELECT RI.refundInvoiceNo,
                    RI.amount,
                    RI.status, 
                    RI.handledReceptID AS refRecept, 
                    RI.datetime AS refDateTime,
                    RI.paymentInvoiceNo,
                    RI.voidDateTime,
                    PI.reservationID, 
                    RES.date AS resDate,
                    RES.startTime AS resTime,
                    SER.name,
                    STAFF.fName AS staffFName,
                    STAFF.lName AS staffLName
            FROM refundinvoices AS RI
            INNER JOIN paymentinvoices AS PI
            ON RI.paymentInvoiceNo = PI.paymentInvoiceNo
            INNER JOIN reservations AS RES
            ON RES.reservationID = PI.reservationID
            INNER JOIN services AS SER
            ON SER.serviceID = RES.serviceID
            INNER JOIN staff AS STAFF
            ON STAFF.staffID = RES.staffID
            INNER JOIN customers AS CUST
            ON CUST.customerID = RES.customerID
            WHERE RI.refundInvoiceNo = :refInvoiceNo;";

        $results = $this->customQuery(
            $SQLstatement,
            [":refInvoiceNo" => $refInvoiceNo]
        );
        return $results[0];
    }
}

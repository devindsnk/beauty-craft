<?php
class Sales extends Controller
{
    public function __construct()
    {
        $this->salesModel = $this->model('SalesModel');
        $this->reservationModel = $this->model('ReservationModel');
    }

    public function refundPayment($payInvoiceNo)
    {
        $results = $this->salesModel->createRefundInvoice($payInvoiceNo);

        if ($results)
            Toast::setToast(1, "Refund successful", "Refund invoice has been created.");
        else
            Toast::setToast(0, "Refund failed", "Refund invoice has not been created.");

        header('Content-Type: application/json; charset=utf-8');
        print_r(json_encode($results));
    }

    public function cancelPayment($payInvoiceNo)
    {
        $reservationID = $this->salesModel->getReservationIDByPayInvoiceNo($payInvoiceNo);

        $this->salesModel->beginTransaction();
        $result1 = $this->salesModel->voidPaymentInvoice($payInvoiceNo);
        $result2 = $this->reservationModel->markReservationConfirmed($reservationID);
        $this->salesModel->commit();

        if ($result1 && $result2)
            Toast::setToast(1, "Payment cancelled successfuly", "");
        else
            Toast::setToast(0, "Payment cancellation failed", "");

        header('Content-Type: application/json; charset=utf-8');
        print_r(json_encode($result1 && $result2));
    }

    public function voidRefundInvoice($refInvoiceNo)
    {
        $results = $this->salesModel->voidRefundInvoice($refInvoiceNo);

        if ($results)
            Toast::setToast(1, "Refund cancelled successfuly", "");
        else
            Toast::setToast(0, "Refund cancellation failed", "");

        header('Content-Type: application/json; charset=utf-8');
        print_r(json_encode($results));
    }
}

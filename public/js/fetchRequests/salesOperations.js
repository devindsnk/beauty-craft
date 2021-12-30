function refundPayment(btn) {
    let invoiceNo = btn.getAttribute("data-id");
    fetch(`http://localhost:80/beauty-craft/Sales/refundPayment/${invoiceNo}`)
        .then(response => response.json())
        .then(state => {
            window.location.reload(); 
    })
 }

 function voidPayInvoice(btn) {
    let invoiceNo = btn.getAttribute("data-id");
    // console.log("void pay " +invoiceNo);
    fetch(`http://localhost:80/beauty-craft/Sales/cancelPayment/${invoiceNo}`)
        .then(response => response.json())
        .then(state => {
            if(state){
                window.location.reload(); 
            }
    })
 }

 function voidRefInvoice(btn) {
    let invoiceNo = btn.getAttribute("data-id");
    // console.log("void ref " + invoiceNo);
    fetch(`http://localhost:80/beauty-craft/Sales/voidRefundInvoice/${invoiceNo}`)
        .then(response => response.json())
        .then(state => {
            window.location.reload(); 
    })
 }
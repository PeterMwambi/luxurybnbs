<section class="container-fluid d-flex justify-content-center">
    <div class="col-md-4">
        <div class="my-3">
            <h2 class="text-center">Client Booking Receipt</h2>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-end">
                    <div class="mx-3">
                        <h6><strong>Receipt Generated On:</strong></h6>
                        <h6>
                            <?php echo date("l, d/m/y, g:iA") ?>
                        </h6>
                    </div>
                </div>
                <div class="my-3">
                    <h6><strong>Name:</strong></h6>
                    <h6>Peter Mwambi</h6>
                </div>
                <div class="my-3">
                    <h6><strong>Booking Id:</strong></h6>
                    <h6>
                        <?php echo strtoupper(uniqid("LBNB", )) ?>
                    </h6>
                </div>
                <div class="my-3">
                    <h6><strong>Date of Booking:</strong></h6>
                    <h6>
                        <?php echo date("d/m/Y"); ?>
                    </h6>
                </div>
                <div class="my-3">
                    <h6><strong>Expected Check in Date:</strong></h6>
                    <h6>
                        <?php echo date("d/m/Y"); ?>
                    </h6>
                </div>
                <div class="my-3">
                    <h6><strong>Expected Checkout Date:</strong></h6>
                    <h6>
                        <?php echo date("d/m/Y"); ?>
                    </h6>
                </div>
                <div class="my-3">
                    <h6><strong>Payment Type:</strong></h6>
                    <h6>Deposit</h6>
                </div>
                <div class="my-3">
                    <h6><strong>Payment Amount:</strong></h6>
                    <h6>4500ksh</h6>
                </div>
                <div class="my-3">
                    <h6><strong>Discount:</strong></h6>
                    <h6>Nill</h6>
                </div>
                <div class="my-3">
                    <h6><strong>Payment Mode:</strong></h6>
                    <h6>Mpesa</h6>
                </div>
                <div class="my-3">
                    <h6><strong>Transaction Code:</strong></h6>
                    <h6>QW907489DFA</h6>
                </div>
                <div class="my-3">
                    <h6><strong>Points As at
                            <?php echo date("d/m/Y") ?>:
                        </strong></h6>
                    <h6>1200 points</h6>
                </div>
                <div class="my-3">
                    <h6><strong>Points Awarded:</strong></h6>
                    <h6>100 points</h6>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-start my-3">
            <button type="button" class="btn btn-primary" id="print">Print receipt</button>
            <button type="button" class="btn btn-secondary mx-3" id="previous">Go back</button>
        </div>
    </div>
</section>



<script>
var printButton = document.getElementById("print");
var previous = document.getElementById("previous");
printButton.addEventListener("click", function(e) {
    e.preventDefault();
    window.print();
});

previous.addEventListener("click", function(e) {
    e.preventDefault();
    window.history.back();
});
</script>
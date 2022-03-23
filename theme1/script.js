var wpwlOptions = {
  style: "plain",
  showCVVHint: false,
  showPlaceholders: true,
  showLabels: false,
  imageStyle: "svg",
  brandDetection: true,
  brandDetectionType: "binlist",
  brandDetectionPriority: ["VISA", "MAESTRO", "MASTER"],

  onReady: function () {
    $(".wpwl-button-pay").text("Pay $40.00");
    moveContent();
  },
  onChangeBrand: function () {
    hideBrands();
  }
};

wpwlOptions.onError = function (error) {
  // check if shopper payed after 30 minutes aka checkoutid is invalid
  if (error.name === "InvalidCheckoutIdError") {
    //doSomething();
  } else if (error.name === "WidgetError") {
    console.log("here we have extra properties: ");
    console.log(error.brand + " and " + error.event);
  }
  // read the error message
  console.log(error.message);
};

$("input").on("input", function () {});

function hideBrands() {
  $(".wpwl-wrapper-brand").hide();
  $(".wpwl-brand-card").hide();
}

function moveContent() {
  const productHTML = `
    <div class="wpwl-group wpwl-group-product">
      <div class="wpwl-wrapper wpwl-wrapper-product">
        <div class="wpwl-product">
          <div class="name">The Basic Package</div>
          <div class="price">$40/month</div>
        </div>
        <div class="wpwl-product-info">Billed today and monthly thereaafter</div>
      </div>
    </div>
  `;
  $(".wpwl-group-cardHolder").insertBefore(".wpwl-group-cardNumber");
  $(productHTML).insertBefore(".wpwl-group-submit");
}

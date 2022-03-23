var wpwlOptions = {
  style: "plain",
  showCVVHint: false,
  showPlaceholders: true,
  imageStyle: "svg",
  brandDetection: true,
  brandDetectionType: "binlist",
  brandDetectionPriority: ["VISA", "MAESTRO", "MASTER"],

  onReady: function () {
    $(".wpwl-button-pay").text("Pay £ 1,188.00");
    $(".wpwl-label-cardHolder").text("Name on Card");
    $(".wpwl-label-cardNumber").text("Card Information");
    moveContent();
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

function moveContent() {
  const productHTML = `
    <div class="wpwl-group wpwl-group-product">
      <div class="wpwl-product">
        <div class="content">
          <div class="name">Product Name</div>
          <div class="info">Product Short description</div>
        </div>
        <div class="price">£ 1,188.00</div>
      </div>
    </div>
  `;

  $(".wpwl-group-cardHolder").insertBefore(".wpwl-group-cardNumber");
  $(productHTML).insertBefore(".wpwl-group-submit");
  $(".wpwl-wrapper-cardNumber").append('<img src="cards.png" alt="" class="icon">');
  $(".wpwl-wrapper-cvv").append('<img src="cvv.png" alt="" class="icon">');
  $(".wpwl-wrapper-submit").append('<button id="backButton" class="wpwl-button wpwl-button-back" type="reset">Back</button>');

  document.getElementById("backButton").onclick = function() {
    window.location.href = "../index.html";
   };
}

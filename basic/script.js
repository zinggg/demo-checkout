

var wpwlOptions = {
    style:"plain",
    showCVVHint: false,
    showPlaceholders: true,
    showLabels: false,
    imageStyle: "svg",
    brandDetection: true,
    brandDetectionType: "binlist",
    brandDetectionPriority: ["VISA","MAESTRO","MASTER"],

    onReady: function () {
        $(".wpwl-group-cardHolder").insertBefore(".wpwl-group-cardNumber");
    },
    onChangeBrand: function() {
        hideBrands();
    },
}

function hideBrands() {
  $('.wpwl-wrapper-brand').hide();
  $('.wpwl-brand-card').hide();
  
}

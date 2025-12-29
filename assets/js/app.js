$(".carousel").carousel();

// Hero Slider with autoplay
$(".slider").carousel({
  interval: 5000,  // 5 seconds per slide
  pause: "hover",  // Pause on hover
  wrap: true,      // Loop continuously
  keyboard: true   // Keyboard navigation
});

var $myGroup = $("#leadership");
$myGroup.on("show.bs.collapse", ".collapse", function() {
  $myGroup.find(".collapse.show").collapse("hide");
});

// var list =

//   countries: [
//     {
//       name: "Afghanistan GLOBAL",
//       areacode: "8787"
//     },
//     {
//       name: "Albania",
//       areacode: "446"
//     },
//     {
//       name: "Algeria",
//       areacode: "212"
//     },
//     {
//       name: "American Samoa",
//       areacode: "767"
//     },
//     {
//       name: "Andorra",
//       areacode: "5454"
//     }
//   ]
// };

// var countrySelect = document.getElementById("countrySelect");

// countrySelect.addEventListener("change", function(e) {
//   console.log(this.value);
//   console.log(findAreaCode(this.value));
// });

// function findAreaCode(name) {
//   var resultItems = list.countries.filter(function(currentItem) {
//     return currentItem.name == name;
//   });
//   console.log(resultItems[0]);

//   return resultItems[0] ? resultItems[0].areacode : "N/A";
// }

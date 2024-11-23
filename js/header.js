let userBox = document.querySelector(".user-box");
document.querySelector("#user-btn").onclick = () => {
  userBox.classList.toggle("active");
  // navbar.classList.remove('active');
};

// $(document).ready(function() {
//   $('#myForm').on('submit', function(){
//     var url = $(this).attr("action");
//     $.post(search.php);
//   });
// });

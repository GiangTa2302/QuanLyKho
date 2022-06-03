<script src="{{asset('assets/admin/js/settings.js')}}"></script>

<script src="{{asset('assets/admin/js/datatables.js')}}"></script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Datatables with Buttons
    var datatablesButtons = $("#datatables-buttons").DataTable({
      responsive: true,
      lengthChange: !1,
      buttons: ["copy", "print"]
    });
    datatablesButtons.buttons().container().appendTo("#datatables-buttons_wrapper .col-md-6:eq(0)");
  });
</script>
<script>
  document.addEventListener("DOMContentLoaded", function(event) { 
    setTimeout(function(){
      if(localStorage.getItem('popState') !== 'shown'){
        window.notyf.open({
          type: "success",
          message: "Get access to all 500+ components and 45+ pages with AdminKit PRO. <u><a class=\"text-white\" href=\"https://adminkit.io/pricing\" target=\"_blank\">More info</a></u> 🚀",
          duration: 10000,
          ripple: true,
          dismissible: false,
          position: {
            x: "left",
            y: "bottom"
          }
        });

        localStorage.setItem('popState','shown');
      }
    }, 15000);
  });
</script>
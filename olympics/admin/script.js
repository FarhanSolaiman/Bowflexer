$(document).ready(function () {

    $('.btn-filter').on('click', function () {
      let $target = $(this).data('target');
   		if ($target != 'all') {
        $('.table tr td').css('display', 'none');
        $('.table tr[data-status="' + $target + '"] td').fadeIn('slow');
      } else {
        $('.table tr td').css('display', 'none').fadeIn('slow');
      }
    });
});

// image view
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $(".output").attr("src", e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}


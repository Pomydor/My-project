const modal = new bootstrap.Modal('#cart-modal');
const myCarouselElement = document.querySelector('#myCarousel')
const carousel = new bootstrap.Carousel(myCarouselElement, {
  interval: 10000,
  wrap: false,
  
})


function showCart(cart){
  $('#cart-modal .modal-body').html(cart);
  modal.show();
  let cartQty = $('#modal-cart-gty').text() ? $('#modal-cart-gty').text() : 0;
  $('.mini-cart-gty').text(cartQty);

  if(cartQty) {
    $('#cart-modal .modal-footer .btn-cart').removeClass('d-none');
  } else {
    $('#cart-modal .modal-footer .btn-cart').addClass('d-none');

  }
  
   

}


//Get the button
let mybutton = document.getElementById("btn-back-to-top");

window.onscroll = function () {
scrollFunction();
};

function scrollFunction() {
if (
document.body.scrollTop > 1000 ||
document.documentElement.scrollTop > 20
) {
mybutton.style.display = "block";
} else {
mybutton.style.display = "none";
}
}
mybutton.addEventListener("click", backToTop);

function backToTop() {
document.body.scrollTop = 0;
document.documentElement.scrollTop = 0;
}


function getCart(action){
  $.ajax({
  url:action,
  type:'get',
  success:function(result){
  showCart(result);
  },
  error:function(){
    alert('Error');
  }
  });
}

function clearCart(action) {
  $.ajax({
    url: action,
    type: 'get',
    success: function (result) {
      let now_location = document.location.pathname;
      if (now_location == '/cart/checkout') {
        location = '/cart/checkout';
      } else {
      showCart(result);
    }
    },
    error: function () {
      alert('Error');
    }
  });
}


$(function() {
// Cert
$('.addtocart').on('submit', function(){
    // console.log($(this).serialize());
    // console.log($(this).attr('action'));
    
    let form=$(this);
    $.ajax({
      url: form.attr('action'),
      data: form.serialize(),
      type: 'post',
      success:function(result){
        // console.log(result);
        showCart(result);
      },
      error:function(msg){
        alert('Error!');
        console.log(msg);
        form[0].reset();
      }
    });
    return false;
});


$('#cart-modal .modal-body').on('click', '.del-item', function() {
$.ajax({
url: $(this).data('action'),
type: 'get',
success:function(result){
        let now_location = document.location.pathname;
      if (now_location == '/cart/checkout') {
        location = '/cart/checkout';
      } else {
      showCart(result);
    }
      },
      error:function(msg){
        alert('Error!');
      }
});

});
});

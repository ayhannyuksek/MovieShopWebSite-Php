class movieItem {
    constructor(img_src, movie_tit, movie_price) {
      this.img_src = img_src;
      this.movie_tit = movie_tit;
      this.movie_price = movie_price;
      this.inCart = 0 ;
    }
  }
  
let carts = document.querySelectorAll(".add-cart");//Tüm sepete ekle butonlarını seçtik.
let product = document.querySelectorAll(".carousel-inner")[0];
let product2 = document.querySelectorAll(".carousel-inner")[1];
let product3 = document.querySelectorAll(".carousel-inner")[2];

let product4 = document.querySelector(".home-page");
let deleteMovie = document.querySelector(".col-lg-8");
let movieCont= document.querySelector(".movie-list");
let movieCont2 = document.querySelector(".totalCart");
let movieCont3 = document.querySelector(".totalCost");
let movieCont4 = document.querySelector(".totalInCart");
console.log(product4);
let movieProduct = document.querySelector(".container");
//console.log(movieCont);

// Tüm butonlar üzerinde geziniyoruz.
for(let i=0; i <carts.length;i++){
    carts[i].addEventListener("click", function(){
        cartNums();
        //console.log();
    })
}
//localstoragedan sayf yenilenince veri çekme.
function onLoadLocalStorageToCart(){
    let productNums = localStorage.getItem("cartNums");

    if(productNums){
        document.querySelector(".sepetBtn span").textContent = productNums;
    }
}

//local storage veri kaydetme.
function cartNums(){
    let productNums = localStorage.getItem("cartNums");
    
    productNums = parseInt(productNums);
    // ilk durumda boş ise NaN vermemesini sağlıyor.
    if( productNums ){
        localStorage.setItem("cartNums", productNums + 1);
        document.querySelector(".sepetBtn span").textContent = productNums + 1;
    }else{
        localStorage.setItem("cartNums",1);
        document.querySelector(".sepetBtn span").textContent = 1; //Sepetim butonunun sayısını güncellemek için var
    }
}

onLoadLocalStorageToCart()

eventListeners();

function eventListeners(){
    if(product){
    product.addEventListener("click",deneme);
}
    if(product2){
        product2.addEventListener("click",deneme);
       
    }
    if(product3){
        product3.addEventListener("click",deneme);
       
    }
    if(product4){
        product4.addEventListener("click",deneme);
       
    }
    if(deleteMov){
        deleteMovie.addEventListener("click",deleteMov);
    }  
    movieProduct.addEventListener("click",quantityItem);
    

}

function quantityItem(e){

    //console.log(e.target);
    if(e.target.className === "arttır md hydrated"){
        //console.log(e.target.parentElement.parentElement);
        updateInCart(e.target.parentElement.parentElement);

    }else if(e.target.className === "azalt md hydrated"){
        decreaseCart(e.target.parentElement.parentElement);
    }
}

function decreaseCart(elements){
    let inCartItem = localStorage.getItem("movieInCart")
    let cartNums =localStorage.getItem("cartNums")
    let totalPrice = localStorage.getItem("totalPrice");
    totalPrice = parseInt(totalPrice);
    inCartItem = JSON.parse(inCartItem);
    cartNums = parseInt(cartNums);
    console.log(elements.childNodes[5].textContent);
    
    for(let key in inCartItem){
        if((inCartItem[key].img_src === elements.childNodes[1].src)&&(elements.childNodes[5].textContent!=0)){   
        cartNums = cartNums - 1;
        inCartItem[key].inCart = inCartItem[key].inCart - 1;
        totalPrice = totalPrice - inCartItem[key].movie_price ;
        localStorage.setItem("totalPrice",totalPrice);
        localStorage.setItem("movieInCart", JSON.stringify(inCartItem));
        console.log(inCartItem[key].inCart);
        localStorage.setItem("cartNums",cartNums);
        addToCart();  
        
    }}

}

function updateInCart(elements){
    let inCartItem = localStorage.getItem("movieInCart")
    let cartNums =localStorage.getItem("cartNums")
    let totalPrice = localStorage.getItem("totalPrice");
    totalPrice = parseInt(totalPrice);
    inCartItem = JSON.parse(inCartItem);
    cartNums = parseInt(cartNums);
    //console.log(elements.textContent);
    
    for(let key in inCartItem){
        if(inCartItem[key].img_src === elements.childNodes[1].src){
        cartNums = cartNums + 1;
        inCartItem[key].inCart = inCartItem[key].inCart + 1;
        totalPrice = totalPrice + inCartItem[key].movie_price ;
        localStorage.setItem("totalPrice",totalPrice);
        localStorage.setItem("movieInCart", JSON.stringify(inCartItem));
        console.log(inCartItem[key].inCart);
        localStorage.setItem("cartNums",cartNums);
        addToCart();
        
        
    }
}



}



function deleteMov(e){
    
    if(e.target.className === "md icon-small hydrated"){
        e.target.parentElement.parentElement.remove();
        deleteFromStorage( e.target.parentElement.parentElement);
       console.log(4);
    }
}

function deleteFromStorage(deleteItem){
    //console.log(deleteItem.childNodes[1].src);
    let del = localStorage.getItem("movieInCart");
    let cartNums =localStorage.getItem("cartNums")
    let totalPrice = localStorage.getItem("totalPrice");
    totalPrice = parseInt(totalPrice);
    cartNums = parseInt(cartNums);
    del = JSON.parse(del);
    

    for(let key in del ){
        //console.log(del[key].img_src);
        if(del[key].img_src === deleteItem.childNodes[1].src){
            cartNums = cartNums -  del[key].inCart;
            totalPrice = totalPrice - (del[key].movie_price * del[key].inCart );
            localStorage.setItem("totalPrice",totalPrice);
            localStorage.setItem("cartNums",cartNums);
            delete del[key];
            localStorage.setItem("movieInCart", JSON.stringify(del));
            addToCart();
            
        }

    }


}
function deneme(e){
    let img_src, product_name,price;
    e.target.parentElement.parentElement;
    console.log(e.target);

    if(e.target.className ==="add-cart btn btn-dark mt-3 d-flex justify-content-center" || e.target.className ==="add-cart btn btn-dark d-flex justify-content-center mt-5"){
    let movie = e.target.parentElement;
    //console.log(movie);

    movie.childNodes.forEach(element => {
        //console.log(movie.childNodes);
        if(element.className ==="card-img-top"){
            //console.log(element.src);
            img_src = element.src;
        }else if(element.tagName === "H4"){
            //console.log(element.textContent);
            movie_tit = element.textContent;
        }else if((element.tagName === "H5")){
            //console.log(element.textContent);
            movie_price =parseInt (element.textContent);
            
        }
    });
    let movieClass = new movieItem(img_src, movie_tit, movie_price);
    //console.log(movieClass);
    setItems(movieClass);
    totalPrice(movieClass);
    Added();
}else if(e.target.className === "md icon-large hydrated"){
    let movie = e.target.parentElement.parentElement.parentElement;
    console.log(movie);
    movie.childNodes.forEach(element => {
        //console.log(movie.childNodes);
        if(element.className ==="card-img-top"){
            //console.log(element.src);
            img_src = element.src;
        }else if(element.tagName === "H4"){
            //console.log(element.textContent);
            movie_tit = element.textContent;
        }else if((element.tagName === "H5")){
            //console.log(element.textContent);
            movie_price =parseInt (element.textContent);
            
        }
    });
    let movieClass = new movieItem(img_src, movie_tit, movie_price);
    //console.log(movieClass);
    setItems(movieClass);
    totalPrice(movieClass);
    Added();
}
}

function setItems(movieClass){
    let cartItems = localStorage.getItem("movieInCart");
    cartItems = JSON.parse(cartItems);
   
    if(cartItems != null){

        if(cartItems[movieClass.movie_tit] == undefined){
            cartItems = {...cartItems, 
            [movieClass.movie_tit]: movieClass
        }
    }
        cartItems[movieClass.movie_tit].inCart += 1;
    }else{
        movieClass.inCart = 1;
        cartItems = {
            [movieClass.movie_tit]: movieClass
        }
    
    }
    
    localStorage.setItem("movieInCart", JSON.stringify(cartItems));

}
function totalPrice(movieClass){
    let cartPrice = localStorage.getItem("totalPrice");
   
    if(cartPrice != null){
        cartPrice = parseInt(cartPrice);
        localStorage.setItem("totalPrice",cartPrice + movieClass.movie_price);

    }else{
        localStorage.setItem("totalPrice",movieClass.movie_price);
    }

}

function addToCart(){
    let movieItem = localStorage.getItem("movieInCart");
    let movieTotalPrice = localStorage.getItem("totalPrice");
    let totalInCart = localStorage.getItem("cartNums");
    movieTotalPrice = parseInt(movieTotalPrice);
    movieItem = JSON.parse(movieItem);
    //console.log(movieItem);

    if(movieItem && movieCont ){
        movieCont.innerHTML = ""; 
        movieCont2.innerHTML ="";
        for(let key in movieItem ){
            console.log(movieItem[key]);
            
            movieCont.innerHTML += ` 
                <div class = "movie-list">
                    <img src = "${movieItem[key].img_src}"></img>
                    <h4>${movieItem[key].movie_price} ₺</h4>
                    <h5><ion-icon class = "azalt" name="arrow-back-circle-sharp"> </ion-icon>${movieItem[key].inCart}<ion-icon class = "arttır" name="arrow-forward-circle-sharp"></ion-icon></h5>
                    <button class="btn"><ion-icon size="small" name="trash"></ion-icon></button>
                    <h5 class="total">${movieItem[key].movie_price * movieItem[key].inCart } ₺</h5>
                    
                </div>`

            movieCont2.innerHTML += `
                <div class = "totalCart">
                <h6>${movieItem[key].movie_tit} x ${movieItem[key].inCart}:<span>${movieItem[key].movie_price*movieItem[key].inCart}₺</span></h6>    
                
            `
            
        }; 

    }
    movieCont3.childNodes[1].childNodes[1].innerHTML = (movieTotalPrice);
    movieCont4.childNodes[1].childNodes[1].innerHTML= (totalInCart);
}




{/* <h6>The Shawsank Redemptionx3:<span>180₺</span></h6>
<h6>The Godfather x2 <span>120₺</span></h6>
<hr>
<h4>Total Cost: 300₺<span></span></h4> */}

addToCart();

function openForm() {
    
    document.getElementById("myForm").style.display = "block";
    document.getElementById("formAdress").style.display = "block";
    
  }
  
  function closeForm() {
    document.getElementById("myForm").style.display = "none";
    document.getElementById("formAdress").style.display = "none";
  }

  function openForm2() {
    document.getElementById("myForm2").style.display = "block";
    document.getElementById("formAdress").style.display = "block";
  }
  
  function closeForm2() {
    document.getElementById("myForm2").style.display = "none";
    document.getElementById("formAdress").style.display = "none";
  }

  function alertPay(){
      document.getElementById("pay-card").click();
      Swal.fire({
        title: 'Ödeme yapmak istiyor musunuz?',
        
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#4CAF50',
        cancelButtonColor: '#d33',
        cancelButtonText:"İptal",
        confirmButtonText: 'Onaylıyorum'
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire(
            'Dikkat',
            'Eğer bilgilerinizi eksiksiz girdiyseniz bankanıza yönlendirileceksiniz. Aksi takdirde işlem iptal edilecektir.', 
          )
          
        }
        
      }
      )
      localStorage.clear();
     
  }
function Added(){
    Swal.fire({
      toast: true,
      icon: 'success',
      title: 'Ürün Sepete Eklendi',
    
      animation: false,
      position: 'center',
      showConfirmButton: false,
      timer: 1000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
        
      }
      
    })
 
}  
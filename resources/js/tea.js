
    let products = [];

    function toShort(str,max=50){        
        if(str.length > max){
            return  str.substring(0,max)+"....."
        }

        return str;

    }

    function toShow(x){
        $("#products").empty();
        x.map(product=> {
            $("#products").append(`

            <div class="card product pt-4">
                <img src="http://sample.org/images/menu/${product.image}" class="card-img-top" alt="">
                <div class="card-body border rounded">
                    <p class="card-title font-weight-bold text-nowrap overflow-hidden text-primary">
                    ${product.name}
                    </p>
                    <small class="text-black-50">
                    ${toShort(new String(product.description), 120)}
                    </small>
                    <div class="d-flex justify-content-between align-items-end mt-3">
                        <span class="font-weight-bold">${product.price / 100}Ks</span>
                        <button class="btn btn-sm btn-outline-primary add-to-cart" data-id="${product.id}">
                        Add <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            `)
        })
    }

    function cartTotal(){

        let count = $(".item-in-cart-cost").length;

        $(".item-in-cart-count").html(count);

        if(count>0){
            let totalCost = $(".item-in-cart-cost").toArray().map(el=>el.innerHTML).reduce((x,y)=>Number(x)+Number(y));
            // console.log(typeof totalCost);
            $(".total").html(`

                <div class="d-flex justify-content-between font-weight-bold px-3">
                    <h4>Total</h4>
                    <h4>$ <span class="cart-cost-total">${(Number(totalCost) / 100).toFixed(2)}</span></h4>
                </div>

            `)
        }else{
            document.getElementById('order').classList.add("disabled")
            $(".total").html("empty cart")
        }

    }



    $.get("/menus/bulk",function (data) {
        products = data;
        toShow(products);
    })

    $("#search").on("keyup",function () {
        let keyword = $(this).val().toLowerCase();
        // $(".product").filter(function () {
        //
        //     $(this).toggle($(this).text().toLowerCase().indexOf(keyword) > -1);
        //
        // });

        console.log();

        if(keyword.trim().length){

            let filterProducts = products.filter(product=>{
                if(product.name.toLowerCase().indexOf(keyword) > -1 || product.description.toLowerCase().indexOf(keyword) > -1 || product.price == keyword){
                    return product;
                }
            })

            toShow(filterProducts);
        }

    });

    $.get("/categories",function (data) {
        data.map(cat => $("#category").append(`<option value="${cat}">${cat}</option>`))
    })

    $("#category").on("change",function () {

        let selectedCategory = $(this).val();
        console.log(typeof selectedCategory);

        if(selectedCategory != 0){
            let filterProducts = products.filter(product=>{
                if(product.category.name === selectedCategory){
                    return product;
                }
            })

            toShow(filterProducts);
        }else{
            console.log(products)
            toShow(products);
        }
    })



    $("#products").delegate(".add-to-cart","click",function () {
        let currentItemId = $(this).attr("data-id");

        let productInfo = products.filter(el=>el.id == currentItemId)[0];

        // Logic Portion
            let count = $(".item-in-cart-count").length;
            if(count == 0){
                if(sessionStorage.getItem("menu") != null){
                    sessionStorage.removeItem("menu");
                }
            }else{
                document.getElementById('order').classList.remove("disabled")
            }
            
        // if(count == 0){

        // }else{
        //     $(".total").html("empty cart")
        // }
        // Logic Portion

        if($(".item-in-cart").toArray().map(el=>el.getAttribute("data-id")).includes(currentItemId)){

            alert("Already Added")

        }else{
            let menuLists= {};
            
            if(sessionStorage.getItem("menu") != null){
                menuLists = JSON.parse(sessionStorage.getItem("menu"));
            }
            menuLists[`menu${currentItemId}`] = currentItemId;
            sessionStorage.setItem("menu", JSON.stringify(menuLists));
            
            //   sessionStorage.setItem("menu", JSON.stringify(menuLists));
            //   let data = JSON.parse(sessionStorage.getItem("menu"));
            // sessionStorage.clear();

            // console.log(typeof data)
            // console.log(data.menu3)

            $("#cart").append(`
        <div class="card border-0 item-in-cart" data-id="${productInfo.id}">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-end">
                    <img src="http://sample.org/images/menu/${productInfo.image}" class="img-in-cart" alt="">
                    <button class="btn btn-outline-danger remove-from-cart" data-id="${productInfo.id}">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </div>
                <p class="mt-3">
                    ${productInfo.name}
                </p>
                <div class="d-flex justify-content-between align-items-end">
                    
                    <p class="mb-0">$ <span class="item-in-cart-cost">${productInfo.price}</span></p>
                </div>
                <hr>
            </div>
        </div>
        `);

        }

        cartTotal();

    })

    $("#cart").delegate(".remove-from-cart","click",function () {
        let removeItemId = $(this).attr("data-id");

        const menuLists = JSON.parse(sessionStorage.getItem("menu"));
        console.log(menuLists)
        delete menuLists["menu"+removeItemId];
        if(Object.keys(menuLists).length == 0){
            sessionStorage.removeItem("menu");
        }else{
            sessionStorage.setItem("menu", JSON.stringify(menuLists));
        }
        console.log(sessionStorage.getItem("menu"))
  
        $(this).parentsUntil("#cart").remove();
        cartTotal();

    })

    $("#cart").delegate(".quantity-plus","click",function () {

        let q =$(this).siblings(".quantity").val();
        let p = $(this).siblings(".quantity").attr("unitPrice");
        let newQ = Number(q)+1;
        let newCost = p * newQ;
        // console.log(p);
        $(this).siblings(".quantity").val(newQ);
        $(this).parent().siblings("p").find(".item-in-cart-cost").html(newCost.toFixed(2));
        cartTotal();
    })

    $("#cart").delegate(".quantity-minus","click",function () {

        let q =$(this).siblings(".quantity").val();
        let p = $(this).siblings(".quantity").attr("unitPrice");
        if(q>1){

            let newQ = Number(q)-1;
            let newCost = p * newQ;
            // console.log(p);
            $(this).siblings(".quantity").val(newQ);
            $(this).parent().siblings("p").find(".item-in-cart-cost").html(newCost.toFixed(2));
            cartTotal();

        }

    })

    

    $("#cart").delegate(".quantity","keyup change",function () {

        let q =$(this).val();
        let p = $(this).attr("unitPrice");
        if(q>1){

            let newQ = Number(q);
            let newCost = p * newQ;
            // console.log(p);
            $(this).val(newQ);
            $(this).parent().siblings("p").find(".item-in-cart-cost").html(newCost.toFixed(2));
            cartTotal();

        }else{
            alert("more than one");
        }

    })

    $("#order").click(function () {
        let count = $(".item-in-cart-count").length;        
        if(count>0){
            $(".item-in-cart-count").html(0);
        }
        const menuLists = JSON.parse(sessionStorage.getItem("menu"));
        // api post
            orderPost(menuLists);
        // api post
        $("#cart").html('');
        $(".total").html("empty cart")

        // document.getElementById('order').classList.add("disabled")
        $(".order-menu").classList.remove("disabled")
        // Create Order Session
        // Object.keys(menuLists).length
        
        sessionStorage.setItem("order", JSON.stringify(menuLists));
        // console.log("after order")
        // console.log(JSON.parse(sessionStorage.getItem("order")));

        // Create Order Session


        sessionStorage.removeItem("menu");
        


    })

    
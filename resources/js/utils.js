export const split=(list)=>{
   return list.split(',')
}

export const backgroundColor=(color)=>{
    return {'background-color':color}
}

// Add product to cart
export const AddToCart=(Order,productID)=>{
   
   const {orders,total_price} = Order

   let existingCart = localStorage.getItem('cart')
   let InCart =false;

   let cart = existingCart ? JSON.parse(existingCart) : {orders:{},total_price:0,total_products:0}

//   check if product is in the cart

   for(let item in cart.orders){
    if(item == productID){   

        const {[item]:cartInfo} = cart.orders

        const {order_details,total_quantity} = orders[productID]
        cartInfo.order_details.push(order_details[0])

        cartInfo.total_quantity =  cartInfo.total_quantity + total_quantity
        cart.total_price = cart.total_price + total_price
        cart.total_products = cart.total_products + total_quantity

        InCart=true
        }
   }

   // if product is not in the cart then create a new order
   if(!InCart){
      cart.orders[productID] = orders[productID]
      cart.total_price =cart.total_price + total_price
      cart.total_products = cart.total_products + orders[productID].total_quantity
   }

    let newOrder = JSON.stringify(cart)
    localStorage.setItem('cart',newOrder)
}

// remove the product from cart
export const RemoveProduct =(productId)=>{
   let Cart = JSON.parse(localStorage.getItem('cart'))
   
   let {orders,total_products,total_price} = Cart
   
   let deduction_price = orders[productId].price * orders[productId].total_quantity
   let deduction_quantity = orders[productId].total_quantity

   Cart.total_price = total_price - deduction_price
   Cart.total_products = total_products - deduction_quantity

   const deleted= delete Cart.orders[productId] 
   
   if(deleted){
      localStorage.setItem('cart',JSON.stringify(Cart))
   }
  
   return deleted;
}


// remove a specific order details
export const RemoveOrderDetails=(productID,index)=>{
   let Cart = JSON.parse(localStorage.getItem('cart'))
   
   let {orders,total_price,total_products} = Cart

   let price = orders[productID].price

   // stores the length of order Details
   let orderDetailslength = orders[productID].order_details.length;

   // If order details is equal to one remove the whole order
   if(orderDetailslength == 1){
        delete Cart.orders[productID]
   }

   // else just remove the specified order detail
   else{
      Cart.total_price = total_price - (price * orders[productID].order_details[index].quantity)
      Cart.total_products = total_products - orders[productID].order_details[index].quantity
      Cart.orders[productID].total_quantity =  Cart.orders[productID].total_quantity - orders[productID].order_details[index].quantity
      Cart.orders[productID].order_details = orders[productID].order_details.splice(index,1)
   }

   localStorage.setItem('cart',JSON.stringify(Cart))
} 

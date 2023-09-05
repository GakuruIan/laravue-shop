export const split=(list)=>{
   return list.split(',')
}

export const backgroundColor=(color)=>{
    return {'background-color':color}
}

export const AddToCart=(Order,productID)=>{
   let existingCart = localStorage.getItem('cart')
   let InCart =false;

   let cart = existingCart ? JSON.parse(existingCart) : {}

//   check if product is in the cart
   for(let item in cart){
    if(item == productID){   
        const {[item]:cartInfo} = cart

        const {order_details,quantity} = Order[productID]

        cartInfo.order_details.push(order_details[0])

        cartInfo.total_quantity =  cartInfo.total_quantity + quantity
        InCart=true
        }
   }

//    if product is not in the cart then create a new order
   if(!InCart){
    cart[productID] = Order[productID]
   }

    let newOrder = JSON.stringify(cart)
    localStorage.setItem('cart',newOrder)
}


export const RemoveProduct =(productId)=>{
   let Cart = JSON.parse(localStorage.getItem('cart'))
  
   const deleted= delete Cart[productId] 
   
   if(deleted){
      localStorage.setItem('cart',JSON.stringify(Cart))
   }
  
   return deleted;
}
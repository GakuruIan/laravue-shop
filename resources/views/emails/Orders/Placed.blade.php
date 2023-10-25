<div class="max-w-5xl mx-auto">
    <h1 class="text-center text-xl mb-3">Laravue Shop</h1>
    <p class="text-base px-2">
        Dear {{$Customer}},

        We are excited to inform you that your order with Laravueshop has been successfully placed and is now being processed. Thank you for choosing us for your shopping needs. Below, you'll find the details of your order:<br/>
        
        Order Number: {{$order->tracking_id}}<br/>
        Shipping Fee : {{$order->shipping_fee}}<br/>
        Order Total: {{$order->amount}} <br/>
    </p>
    <p class="text-base">
        Your order is currently being prepared for shipment, and you will receive a confirmation email once it's dispatched. We expect your items to be shipped within a week, and you will be provided with tracking information once it's available.
        
        Should you have any questions or require assistance, please do not hesitate to contact our customer support team at Laravue@gmail.com .
        
        Thank you for shopping with us! We appreciate your trust in Laravueshop, and we look forward to delivering your order promptly.
        
        Best regards,
    </p>
</div>
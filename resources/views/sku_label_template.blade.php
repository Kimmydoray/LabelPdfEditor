<!DOCTYPE html>
<html>
<head>
    <title>Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .receipt {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: white;
        }
        .header {
            text-align: center;
        }
        .items {
            margin-top: 20px;
            border-top: 1px solid #ccc;
            padding-top: 10px;
        }
        .item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        .total {
            margin-top: 10px;
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="receipt">
        <div class="header">
            <h2>Receipt</h2>
            <p>Date: {{ date('Y-m-d H:i:s') }}</p>
        </div>
        <div class="items">
            <div class="item">
                <span>Item 1</span>
                <span>$10.00</span>
            </div>
            <div class="item">
                <span>Item 2</span>
                <span>$15.00</span>
            </div>
            <div class="item">
                <span>Item 3</span>
                <span>$20.00</span>
            </div>
        </div>
        <div class="item_details">
            <p>SKU: {{ ($data['sku'])?: '' }}<span id="sku_preview"><span></p>
            <p>Delivery Instruction: {{ ($data['delivery_instruction'])?: '' }}<span id="delivery_instruction_preview"><span></p>
        </div>
        <div class="total">
            <p>Total: $45.00</p>
        </div>
    </div>
    
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Receipt</title>
    <style>
        .container {
            display: flex;
            background-color: #ebebeb;
            margin-top: 10%;
        }

        .half-width {
            flex: 1;
            width: 50%;
            border: 1px solid #ccc;
            padding: 10px;
            box-sizing: border-box;
        }
        .bg-white {
            background-color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="half-width">
            @include('sku_label_template')
        </div>
        <div class="half-width bg-white">
            <form action="{{ route('generate-receipt') }}" method="post">
                @csrf
                <label for="delivery_instruction">Delivery Instruction:</label>
                
            </form>
        </div>
    </div>
    <script>
        // main.js
        const editableText = document.getElementById('sku');
        const preview = document.getElementById('sku_preview');
        const editableText2 = document.getElementById('delivery_instruction');
        const preview2 = document.getElementById('delivery_instruction_preview');

        editableText.addEventListener('input', function() {
            const newText = editableText.value;
            preview.textContent = newText; 
        });
        editableText2.addEventListener('input', function() {
            const newText2 = editableText2.value;
            preview2.textContent = newText2;
            
        });
    </script>
    <script src="{{ asset('js/pdf_editor_script.js') }}"></script>
</body>
</html>

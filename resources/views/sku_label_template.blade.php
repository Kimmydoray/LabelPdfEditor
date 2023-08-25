<!DOCTYPE html>
<html>
<head>
    <title>PDF Editor</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>
    

    <script>pdfjsLib.GlobalWorkerOptions.workerSrc = '{{ asset('js/pdf.worker.js') }}';</script>
</head>
<body>
    <canvas id="pdf-canvas" width="800" height="600"></canvas>
    <input type="text" id="text-input" placeholder="Enter text">
    </br>
    <button type="submit" id="download-pdf-button">Download PDF</button>
    <script src="{{ asset('js/pdf_editor_script.js') }}"></script>
    
</body>
</html>
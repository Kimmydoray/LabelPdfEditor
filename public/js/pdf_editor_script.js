const canvas = document.getElementById('pdf-canvas');
const textInput = document.getElementById('text-input');
const addButton = document.getElementById('add-text-button');
const downloadButton = document.getElementById('download-pdf-button');

let pdfPage = null; // Store the rendered page

const renderPdf = async () => {
    const pdfBytes = await fetch('../pdf/pdflabel.pdf').then(res => res.arrayBuffer());

    const loadingTask = pdfjsLib.getDocument({ data: pdfBytes });
    const pdfDocument = await loadingTask.promise;
    pdfPage = await pdfDocument.getPage(1);

    const canvasContext = canvas.getContext('2d');
    const viewport = pdfPage.getViewport({ scale: 1 });
    canvas.height = viewport.height;
    canvas.width = viewport.width;

    const renderContext = {
        canvasContext,
        viewport,
    };

    await pdfPage.render(renderContext);
};

// Trigger the rendering when the page loads
window.onload = renderPdf;

// Add event listener to button for adding text
textInput.addEventListener('input', () => {
    const text = textInput.value;
    
    if (pdfPage) {
        const canvasContext = canvas.getContext('2d');
        const fontSize = 12;
        const x = 20;
        const y = 310;
        
        canvasContext.fillStyle = 'black';
        canvasContext.font = `${fontSize}px Arial`;
        canvasContext.fillText(text, x, y);
    }
});



// Function to convert canvas content to PDF and trigger download
const downloadPdf = () => {
    const pdf = new jsPDF(); // Ensure 'jsPDF' is available

    // Add existing PDF content
    const imgData = canvas.toDataURL('image/jpeg');
    pdf.addImage(imgData, 'JPEG', 0, 0);

    // Add added text
    const fontSize = 12;
    for (const textObj of addedText) {
        pdf.text(textObj.text, textObj.x, textObj.y + fontSize);
    }

    // Save the PDF
    pdf.save('modified_pdf.pdf');
};

downloadButton.addEventListener('click', downloadPdf);






// Cargar el XML desde un archivo
function loadXMLDoc(filename) {
  var xhttp = new XMLHttpRequest();
  xhttp.open("GET", filename, false);
  xhttp.send();
  return xhttp.responseXML;
}

// Función para aplicar la transformación XSL
function transformXML(xml) {
  var xslUrl = xml.querySelector('<?xml-stylesheet')?.getAttribute('href');  // Obtener el archivo XSL desde la referencia
  if (!xslUrl) {
    console.error('No XSL found in XML');
    return null;
  }

  var xsl = loadXMLDoc(xslUrl);  // Cargar el archivo XSL
  if (document.implementation && document.implementation.createDocument) {
    var xsltProcessor = new XSLTProcessor();
    xsltProcessor.importStylesheet(xsl);
    return xsltProcessor.transformToFragment(xml, document);  // Aplicar la transformación
  }
  return null;
}

var xml = loadXMLDoc("adopciones.xml");  // Cargar el archivo XML
var transformedContent = transformXML(xml);  // Transformar el XML usando XSL

function GuardarPDF() {
  const { jsPDF } = window.jspdf;
  const doc = new jsPDF();

  if (transformedContent) {
    // Convertir el contenido HTML transformado en texto o usando canvas si es necesario
    doc.html(transformedContent, {
      callback: function (doc) {
        doc.save("documento.pdf");
      },
      margin: [10, 10, 10, 10],
      x: 10,
      y: 10
    });
  } else {
    console.error("No se pudo generar el PDF: el contenido transformado no es válido.");
  }
}

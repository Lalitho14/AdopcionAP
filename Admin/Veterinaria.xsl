<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="/">
    <html>
      <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
          crossorigin="anonymous" />
        <title>Imprimir Adopciones</title>
      </head>
      <body>
        <h2 class="text-center">Adopciones</h2>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-6">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Mascota</th>
                    <th scope="col">Duenio</th>
                    <th scope="col">Fecha</th>
                  </tr>
                </thead>
                <tbody>
                  <xsl:for-each select="Adopciones/Adopcion">
                    <tr>
                      <td>
                        <xsl:value-of select="mascota/nombre" />
                      </td>
                      <td>
                        <xsl:value-of select="duenio/nombre" />
                      </td>
                      <td>
                        <xsl:value-of select="fecha" />
                      </td>
                    </tr>
                  </xsl:for-each>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </body>
    </html>
  </xsl:template>
</xsl:stylesheet>
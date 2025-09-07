Informe y conversión a PDF

El archivo `Informe_EVU1.md` contiene el informe técnico con evidencias.

El archivo `Informe_EVU1.html` fue generado automáticamente en la carpeta `report` usando Pandoc en este entorno.

Para convertir a PDF en Windows (PowerShell), puedes usar una de las siguientes opciones:

1) Usando Pandoc + LaTeX (recomendado para mejor formato):

- Instalar Pandoc: https://pandoc.org/installing.html
- Instalar una distribución de LaTeX (por ejemplo MiKTeX o TeX Live).

Comando (PowerShell):

```powershell
pandoc .\report\Informe_EVU1.md -o .\report\Informe_EVU1.pdf --from markdown --pdf-engine=xelatex
```

2) Usando wkhtmltopdf (convierte HTML generado desde Markdown):
- Instalar wkhtmltopdf: https://wkhtmltopdf.org/downloads.html
- Generar HTML y luego PDF:

```powershell
# generar HTML (usa cualquier renderer o pandoc if available)
# si tienes pandoc:
pandoc .\report\Informe_EVU1.md -o .\report\Informe_EVU1.html
wkhtmltopdf .\report\Informe_EVU1.html .\report\Informe_EVU1.pdf
```

3) Alternativa rápida: abrir `Informe_EVU1.md` en un editor (VS Code) y usar la opción Print -> Save as PDF.

Si quieres, puedo intentar instalar Pandoc y ejecutar la conversión aquí (si me autorizas a instalar software), o generar un HTML intermedio y guardarlo como PDF si la infraestructura lo permite.

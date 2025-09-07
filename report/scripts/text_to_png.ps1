param(
    [string]$inputPath,
    [string]$outputPath
)

Add-Type -AssemblyName System.Drawing

$text = Get-Content -Raw -Path $inputPath
$font = New-Object System.Drawing.Font('Consolas',12)
$brush = [System.Drawing.Brushes]::Black
$padding = 20

# measure text
$bitmapTemp = New-Object System.Drawing.Bitmap(1,1)
$graphicsTemp = [System.Drawing.Graphics]::FromImage($bitmapTemp)
$sizeF = $graphicsTemp.MeasureString($text, $font)
$width = [int]$sizeF.Width + $padding*2
$height = [int]$sizeF.Height + $padding*2
$graphicsTemp.Dispose()
$bitmapTemp.Dispose()

$bitmap = New-Object System.Drawing.Bitmap($width, $height)
$graphics = [System.Drawing.Graphics]::FromImage($bitmap)
$graphics.Clear([System.Drawing.Color]::White)
$graphics.TextRenderingHint = [System.Drawing.Text.TextRenderingHint]::ClearTypeGridFit
$rect = New-Object System.Drawing.RectangleF($padding, $padding, $width - $padding*2, $height - $padding*2)
$graphics.DrawString($text, $font, $brush, $rect)
$graphics.Flush()
$bitmap.Save($outputPath, [System.Drawing.Imaging.ImageFormat]::Png)
$graphics.Dispose()
$bitmap.Dispose()
Write-Output "Saved $outputPath"

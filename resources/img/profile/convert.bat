

@echo off
for %%f in (*.jpg *.jpeg *.png) do (
  magick "%%f" "%%~nf.webp"
)
echo All images have been converted to webp format.
pause
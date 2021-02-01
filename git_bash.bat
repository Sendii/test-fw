@echo off
git add .
git commit -m %1
git push
echo %1
cls
#! /bin/bash
if [ -z "$1" ]
  then
      echo "Informe o nome do repositório principal. " 
      echo " Ex. ./mergemaster <nome-repositório-principal>"
  exit 1
fi
git fetch $1
git checkout master
git merge $1/master
git push origin master

#!/bin/bash

# Exemplo de if

if [ 5 > 2 ]; then
    echo "5 é maior que 2."
else
    echo "5 é menor que 2."
fi

read -p "Diga um número de 1 à 3: " escolha

    case $escolha in
        1)
            echo "Você escolheu a opção 1"
            ;;
        2)
            echo "Você escolheu a opção 2"
            ;;
        3)
            echo "Voce escolheu a opcao 3"
            ;;
        *)
            echo "Opção inválida"
        ;;
    esac
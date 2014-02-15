#!/bin/sh

arg=$1
if [ "${arg}" = "rerank1" ]; then
    perl feature_vector.pl haruzion_all.txt rerank1
    perl recomend.pl haruzion_all.txt.out spot.tsv
    cat result.tsv | sort -n -r -k 2 > recomend.tsv
fi

if [ "${arg}" = "rerank2" ]; then
    perl feature_vector.pl haruzion_all.txt rerank2
    perl recomend.pl haruzion_all.txt.out spot.tsv
    cat result.tsv | sort -n -r -k 2 > recomend.tsv
else
    perl feature_vector.pl haruzion_all.txt
    perl recomend.pl haruzion_all.txt.out spot.tsv
    cat result.tsv | sort -n -r -k 2 > recomend.tsv
fi

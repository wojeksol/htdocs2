baza danych  na temat snickersa
-Produkty do dystrubucja
-Składniki do składprod
-SkładProduktów do produkty
-WartościOdżywcze do produkty
-Fabryki do dsytrybucji 
-Dystrybucja
produkty łączą się ze składemProduktów, a składProduktów ze składnikami.
Produkty z wartościami odżywczymi
fabryki z produktami
produkty z dystrybucją

Produkty: nazwa koszt waga opis data_wprowadzenia

składniki: nazwa opis

SkładnikProd: skladnik odnosinik ,ilosc

Waroścodz: kalorie białko tłuszcze cukry 

Fabryki: adres nazwa dataotwarcia wydajność(liczba produktów na dzień roboczy)

Dystrybycja: region sprezdane sztuk rok

Składniki-> SkładProduktów -> Produkty-> dystrybycja <- fabryki
                                 / \
                                  |
                            WartościOdżywcze


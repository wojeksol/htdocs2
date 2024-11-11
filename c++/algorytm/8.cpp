#include <iostream>

int AgePlusTwenty(int a){
    int wynik = a + 20;
    return wynik;
}

int AgeTimesTwo(int a){
    int wynik = a * 2;
    return wynik;
}

int main(){
    int x = 10;

    std::cout << "Jeżeli Bartek ma 10 lat to dostał od babci " << AgeTimesTwo(x) << " zł a od dziadka " << AgePlusTwenty(x) << " zł";
}
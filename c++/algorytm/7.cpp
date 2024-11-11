#include <iostream>
#include <iomanip>

float NumberOfLitres(){
    float wynik = (6.5 * 132) / 100;
    return wynik;
}

float FuelPrice(float a){
    float wynik = a * 3.29;
    return wynik;
}

int main(){
    std::cout << "Cena paliwa za przejazd 132 km i zużycie " << NumberOfLitres() << " litrów wynosi: " << std::fixed << std::setprecision(2) << FuelPrice(NumberOfLitres()) << " zł";
}
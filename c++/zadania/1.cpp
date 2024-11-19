#include <iostream>

int main() {
    std::cout << "Program oblicza BMI na podstawie podanych danych\n";
    float masa, wzrost, bmi;
    std::cout << "Podaj swoją masę w kilogramach: ";
    std::cin >> masa;
    std::cout << "Podaj swój wzrost w centymetrach: ";
    std::cin >> wzrost;

    wzrost = wzrost / 100;

    bmi = masa / sqrt(wzrost);

    if (bmi < 18.5) {
        std::cout << "Jestes za chudy";
    }
    else if(bmi > 25){
        std::cout << "Jestes za gruby";
    }
    else
    {
        std::cout << "Jestes w normie";
    }
}
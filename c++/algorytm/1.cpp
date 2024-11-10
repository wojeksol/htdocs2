#include <iostream>




int dodawanie(int a, int b){
    int wynik = a + b;
    return wynik;

}

int odejmowanie(int a, int b){
    int wynik = a - b;
    return wynik;
}

int mnożenie(int a, int b){
    int wynik = a * b;
    return wynik;
}

int main(){

    int a,b;

    std::cout << "Podaj liczbe a: ";
    std::cin >> a;

    std::cout << "Podaj liczbe b: ";
    std::cin >> b;

    std::cout << a << " + " << b << " = " << dodawanie(a,b) << '\n';

    std::cout << a << " - " << b << " = " << odejmowanie(a,b) << '\n';

    std::cout << a << " * " << b << " = " << mnożenie(a,b) << '\n';

    return 0;
    
}
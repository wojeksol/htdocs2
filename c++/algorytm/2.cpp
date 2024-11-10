#include <iostream>

int potega(int a){
    int wynik = a * a;
    return wynik;
}

int pole(int a, int b){
    int wynik = (a * b) / 2;
    return wynik;
}

int obwód(int a, int b, int c){
    int wynik = a + b +c;
    return wynik;
}

int main() {
    int a, b, c;

    std::cout << "Program oblicza pole i obwód trójkata prostokątnego.\n";
    std::cout << "Podaj h: ";
    std::cin >> a;
    std::cout << "\nPodaj a: ";
    std::cin >> b;
    std::cout << "\nPodaj b: ";
    std::cin >> c;

    if(!(potega(a) + potega(b) == potega(c))){
        std::cout << "Trójkąt nie jest trójkatem prostokątym";
    }
    else{
        std::cout << "Pole powierzchni trójkata prostokątnego wynosi: " << pole(a, b) << '\n';
        std::cout << "Obwód trójkata prostokątnego wynosi: " << obwód(a, b, c);
    }

    


}
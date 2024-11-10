#include <iostream>

int AreaRectangle(int a, int b){
    int wynik =  a * b;
    return wynik;
}

int PerimeterRectangle(int a, int b){
    int wynik = 2*a + 2*b;
    return wynik;
}

int RandomNumber(){
    return 1 + (rand() % 101);
}

int main(){
    
    int a = RandomNumber(), b = RandomNumber();

    std::cout << "a = " << a << " b = " << b << std::endl;
    std::cout << "Pole prostokąta wynosi: " << AreaRectangle(a,b) << std::endl;
    std::cout << "Obwód prostokąta wynosi: " << PerimeterRectangle(a,b);

    return 0;
}
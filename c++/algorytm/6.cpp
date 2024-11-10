#include <iostream>

int VolumeCuboid(int a, int b, int c){
    int wynik = a * b *c;
    return wynik;
}

int RandomNumber(){
    return 1 + (rand() % 101);
}

int main(){
    srand((unsigned) time(NULL));
    int a = RandomNumber(), b = RandomNumber(), c = RandomNumber();

    std::cout << "a = " << a << " b = " << b << " c = " << c << '\n';

    std::cout << "Objętość tego prostopadłościanu wynosi: " << VolumeCuboid(a,b,c) << std::endl;
}
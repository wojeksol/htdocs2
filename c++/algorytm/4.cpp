#include <iostream>

int VolumeCuboid(int a, int b, int c){
    int wynik = a * b *c;
    return wynik;
}

int LengthEdgeCuboid(int a, int b, int c){
    int wynik = 4*a + 4*b + 4*c;
    return wynik;
}

int RandomNumber(){
    return 1 + (rand() % 101);
}

int main(){
    srand((unsigned) time(NULL));
    int a = RandomNumber(), b = RandomNumber(), c =RandomNumber();

    std::cout << "Program oblicza Gęstość i Długość krawędzi Prostopadłościanu, zmiene a, b i c są generowane podczas działania skryptu\n";

    std::cout << "a = " << a << " b = " << b << " c = " << c << '\n';

    std::cout << "Objętość tego prostopadłościanu wynosi: " << VolumeCuboid(a,b,c) << std::endl;

    std::cout << "Długość krawędzi Prostopadłościanu wynosi: " << LengthEdgeCuboid(a,b,c);

    return 0;
}
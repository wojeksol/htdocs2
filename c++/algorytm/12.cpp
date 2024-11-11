#include <iostream>
#include <iomanip>

int RandomNumer(int a){
    int sum = a + 1;
    return rand() % sum;
}

int main(){
    srand((unsigned) time(NULL));

    float a = RandomNumer(100), b = RandomNumer(100), c = RandomNumer(100), d = RandomNumer(100);

    std::cout << "a: " << a << " b: " << b << " c: " << c << " d: " << d << std::endl;

    if(!(b == 0 || d == 0)){
        float suma = a / b + c / d;
        std::cout << "Wynik x dla równania x = a / b + c / d jest równy: " << std::fixed << std::setprecision(2) << suma;
    }else{
        std::cout << "Brak rozwiązania";
    }
    
}
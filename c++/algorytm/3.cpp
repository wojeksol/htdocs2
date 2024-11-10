#include <iostream>
#include <cstdlib>
#include <iomanip>


float RandomNumer() {
    return 1 + (rand() % 101);
}

float ArithmeticMean(float a, float b, float c){
    float Result = (a + b + c) / 3;
    return Result;
}

int main() {

    srand((unsigned) time(NULL));

    float a = RandomNumer(), b = RandomNumer(), c = RandomNumer();

    std::cout << a << " " << b << " " << c << '\n';

    std::cout << "Średnia aytmetyczna liczb a, b, c wynosi: " << std::fixed << std::setprecision(2) << ArithmeticMean(a,b,c); 


}
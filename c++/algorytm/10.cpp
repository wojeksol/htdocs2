#include <iostream>

int main(){
    int Product1, Product2, Product3, Suma;

    std::cout << "Podaj cene kwiatów: ";
    std::cin >> Product1;

    std::cout << "\nPodaj cene bombonierki: ";
    std::cin >> Product2;

    std::cout << "\nPodaj cene Perfum: ";
    std::cin >> Product3;

    Suma = Product1 + Product2 + Product3;

    if(Suma >= 358){
        std::cout << "Ceny produktów przekraczają budżet!";
    }else{
        std::cout << "Bartkowi pozostało " << 358 - Suma << " zł";
    }

}
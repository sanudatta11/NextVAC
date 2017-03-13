#include<iostream>
using namespace std;
int main(){
    int n;
    cin>>n;
    int val;
    for(int i=0;i<n;i++){
        cin>>val;
        sum+=val;
    }
    cout<<sum;
}
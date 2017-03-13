#include<iostream>
using namespace std;
int main()
{
    int n;
    cin>>n;
    int temp=0;
    for(int i=0;i<n;i++)
    {
        int temp;
        cin>>temp;
        sum+=temp;
    }
    cout<<sum;
}
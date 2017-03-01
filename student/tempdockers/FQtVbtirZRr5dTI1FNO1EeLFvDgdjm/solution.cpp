#include<iostream>
using namespace std;
int main()
{
    int n;
    cin>>n;
    long sum = 1
    for(int i=0;i<n;i++)
    {
        int temp;
        cin>>temp;
        sum+=temp;
    }
    cout<<sum;
    return 0;
}
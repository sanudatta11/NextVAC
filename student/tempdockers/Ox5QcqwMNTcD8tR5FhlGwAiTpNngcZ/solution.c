#include<stdio.h>
int main()
{
    int test,i=0,sum=0;
    scanf("%d",&test);
    for(i=0;i<test;i++)
    {
        int temp;
        scanf("%d",&temp);
        sum+=temp;
    }
    printf("%d",sum);
    return 0;
}
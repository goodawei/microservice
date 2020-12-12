namespace php Goods.Rpc.Tag
service TagService
{
    string name(1:string name);
    string save(1:string tag);
    string get(1:string tag);
}

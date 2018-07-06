<?php

use Illuminate\Database\Seeder;
use App\Model\Making;

class MakingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $make1_1 = new Making();
        $make1_1->recipe_id = 1;
        $make1_1->make = 'Đậu tương ngâm 8h đem đãi sạch chế 1l nước xay nhỏ.Lọc bã thêm 500ml nước nữa xay lần 2 rồi mới lọc bỏ hẳn bã.';
        $make1_1->save();

        $make1_2 = new Making();
        $make1_2->recipe_id = 1;
        $make1_2->make = 'Đun lửa nhỏ và khuấy đều tay để dưới đáy nồi ko bị cặn.Khi đậu nành bắt đầu sôi thì cho vài cây lá dứa vào khoảng 5p cho thơm rồi vớt ra ngay.';
        $make1_2->save();

        $make1_3 = new Making();
        $make1_3->recipe_id = 1;
        $make1_3->make = 'Đun 2l nước lọc cùng đường vàng.Tuỳ gia đình các bạn ăn ngọt hay ko mà thêm lượng đường phù hợp.Mình cho thêm vài cục đường thốt nốt cho màu đẹp.Dập gừng thả vào nồi nước đường cho thơm.Khi ăn nếu có hoa nhài thì thả thêm vào bát hoặc nếu ko thì có thể dùng dầu chuối hoặc dầu hoa bưởi để tăng hương vị nhé.Chúc các bạn thành công..';
        $make1_3->save();

        $make2_1 = new Making();
        $make2_1->recipe_id = 2;
        $make2_1->make = 'Rây mịn bột mỳ, bột nở, đường, muối vào một tô.';
        $make2_1->save();

        $make2_2 = new Making();
        $make2_2->recipe_id = 2;
        $make2_2->make = 'Cho chảo lên bếp cho ít dầu ăn vào chảo, cho hành tây vào xào thơm, tiếp đến bạn cho cà rốt. Vì cà rốt lâu chín hơn nên  xào đến khi hơi chín tái bạn mới cho tiếp  ngô ngọt và đậu côve vào sau. Nêm nếm ít ít hạt nêm và hạt tiêu. Rau củ gần chín, bạn trút xúc xích vào chảo và chỉ cần đảo cho xúc xích được trộn đều với rau củ là được';
        $make2_2->save();

        $make2_3 = new Making();
        $make2_3->recipe_id = 2;
        $make2_3->make = 'Cho sữa tươi, bơ chảy và trứng vào âu quấy đều cho tan. Sau đó đổ hỗn hợp rau củ, xúc xích vào trộn đều.
';
        $make2_3->save();

        $make3_1 = new Making();
        $make3_1->recipe_id = 3;
        $make3_1->make = 'Đặt bạc hà, đường và nước cốt chanh vào một ly cao su 14-16 ounce.
';
        $make3_1->save();

        $make3_2 = new Making();
        $make3_2->recipe_id = 3;
        $make3_2->make = 'Sử dụng một muddler để bruise bạc hà, nhưng không pulverize nó.
                        Thêm shochu và khuấy nó.
';
        $make3_2->save();

        $make3_3 = new Making();
        $make3_3->recipe_id = 3;
        $make3_3->make = 'Đổ đầy nước đá với những viên đá lớn và sau đó đổ nó ra với soda của câu lạc bộ.
';
        $make3_3->save();
    }
}

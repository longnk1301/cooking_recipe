<?php

use Illuminate\Database\Seeder;
use App\Model\Recipe;

class RecipeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $recipe1 = Recipe::create([
            'name' => 'Cách làm tào phớ đơn giản',
            'time' => 30,
            'section' => 4,
            'making' => 'Đậu tương ngâm 8h đem đãi sạch chế 1l nước xay nhỏ.Lọc bã thêm 500ml nước nữa xay lần 2 rồi mới lọc bỏ hẳn bã.
                        Đun lửa nhỏ và khuấy đều tay để dưới đáy nồi ko bị cặn.Khi đậu nành bắt đầu sôi thì cho vài cây lá dứa vào khoảng 5p cho thơm rồi vớt ra ngay.
                        Hoà 20ml nước lọc với 30g đường nho sau đó tráng 1 lớp quanh tô đựng sữa sau đó đổ số nước đường nho còn lại vào nồi sữa đậu khuấy 1 vòng rồi đổ ngay vào tô.Đợi hỗn hợp đông lại và nguội đi thì mới di chuyển cất tủ lạnh.
                        Đun 2l nước lọc cùng đường vàng.Tuỳ gia đình các bạn ăn ngọt hay ko mà thêm lượng đường phù hợp.Mình cho thêm vài cục đường thốt nốt cho màu đẹp.Dập gừng thả vào nồi nước đường cho thơm.Khi ăn nếu có hoa nhài thì thả thêm vào bát hoặc nếu ko thì có thể dùng dầu chuối hoặc dầu hoa bưởi để tăng hương vị nhé.Chúc các bạn thành công.',
            'like' => 20,
            'cuisine' => 'Đài loan',
            'avatar' => 'public/images/products/cach-lam-tao-pho-don-gian-tai-nha.jpg',
            'diffculty_id' => 1,
            'user_id' => 1,
            'collection_id' => 1,
        ]);

        $recipe2 = Recipe::create([
            'name' => 'Bánh Muffin trứng mặn',
            'time' => 20,
            'section' => 2,
            'making' => 'Rây mịn bột mỳ, bột nở, đường, muối vào một tô.
                        Cho chảo lên bếp cho ít dầu ăn vào chảo, cho hành tây vào xào thơm, tiếp đến bạn cho cà rốt. Vì cà rốt lâu chín hơn nên  xào đến khi hơi chín tái bạn mới cho tiếp  ngô ngọt và đậu côve vào sau. Nêm nếm ít ít hạt nêm và hạt tiêu. Rau củ gần chín, bạn trút xúc xích vào chảo và chỉ cần đảo cho xúc xích được trộn đều với rau củ là được
                         Cho sữa tươi, bơ chảy và trứng vào âu quấy đều cho tan. Sau đó đổ hỗn hợp rau củ, xúc xích vào trộn đều.
                         Rót hỗn hợp vừa trộn ở bước trên vào hỗn hợp bột khô rây mịn. Dùng phới trộn nhanh để hỗn hợp hòa quyện là được.
                         Làm nóng lò trước khi nướng 10 phút. Chia bánh vào khuôn, trên cùng bạn đặt các lát thịt muối cuộn tròn đã chuẩn bị ấn vào giữa mặt bánh.
                         Cho bánh vào lò nướng ở nhiệt độ 180 độ C, nướng bánh khoảng 30 - 35 phút. Muốn thử bánh chín hay chưa thì cắm tăm vào bánh rồi rút lên nếu không bị ướt là được. Bánh chín, các lát bacon nướng trên mặt bánh như một bông hoa nhỏ sẽ làm món bánh muffin mặn của bạn trông hấp dẫn hơn.',
            'like' => 10,
            'cuisine' => 'Việt Nam',
            'avatar' => 'public/images/products/cach-lam-bong-lan-trung-muoi-khong-bi-tanh.jpg',
            'diffculty_id' => 2,
            'user_id' => 1,
            'collection_id' => 1,
        ]);

        $recipe3 = Recipe::create([
            'name' => 'Mojito Shochu',
            'time' => 5,
            'section' => 5,
            'making' => 'Đặt bạc hà, đường và nước cốt chanh vào một ly cao su 14-16 ounce.
                        Sử dụng một muddler để bruise bạc hà, nhưng không pulverize nó.
                        Thêm shochu và khuấy nó.
                        Đổ đầy nước đá với những viên đá lớn và sau đó đổ nó ra với soda của câu lạc bộ.
                        Trang trí với một thanh niên bạc hà và phục vụ.
                        Đọc thêm tại: https://norecipes.com/shochu-mojito
                        Tất cả hình ảnh và văn bản trên trang web này đều được bảo vệ bản quyền. Vui lòng không đăng hoặc tái xuất bản công thức này hoặc hình ảnh của công thức mà không được phép. Nếu bạn muốn chia sẻ công thức này chỉ cần chia sẻ liên kết chứ không phải toàn bộ công thức.',
            'like' => 23,
            'cuisine' => 'Janpanese',
            'avatar' => 'public/images/products/mojoto.jpeg',
            'diffculty_id' => 2,
            'user_id' => 1,
            'collection_id' => 1,
        ]);
    }
}

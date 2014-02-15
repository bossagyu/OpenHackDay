package TextSim;
use Exporter;

use Tokenizer;

our @ISA = qw(Exporter);
our @EXPORT = qw(calc_cossim calc_cossim_text);
#use Data::Dumper;

#2つのハッシュで表現されたTermVectorからコサイン類似度を計算するモジュール 幾分メモリを食う
sub calc_cossim{
	my $text1 = shift;
	my $text2 = shift;
	my $num1 = keys %$text1;
	my $num2 = keys %$text2;

	#ベクトルの要素数が大きい方をtext1とする
	if ($num1 > $num2) {
		my $text_tmp = $text1;
		$text1 = $text2;
		$text2 = $text_tmp;
	}
	my $inner_prod = 0.0;
	my $norm1 = 0.0;
	my $norm2 = 0.0;
	#内積とノルムを計算する
	while (my ($key, $value) = each %$text1) {
		$inner_prod += $value * $text2->{$key};
		$norm1 += $value ** 2;
		$norm2 += $text2->{$key} ** 2;
	}
	if ($inner_prod == 0) {
		return 0;
	} else {
		return $inner_prod / (($norm1 ** (1/2)) * ($norm2 ** (1/2)) );
	}
}
#2つの文字列の類似度を計算するモジュール
sub calc_cossim_text {
	my $text1 = shift;
	my $text2 = shift;

	my %text1_hash = ();
	my %text2_hash = ();

	my $N1 = Tokenizer::parse_text_with_tf($text1, \%text1_hash);
	my $N2 = Tokenizer::parse_text_with_tf($text2, \%text2_hash);
    
    #名詞の出現頻度でそれぞれのtfを割る
	map {$text1_hash{$_} /= $N1} keys %text1_hash;
	map {$text2_hash{$_} /= $N2} keys %text2_hash;

	return calc_cossim(\%text1_hash, \%text2_hash);
}
#2つのテキストを形態素解析しコサイン類似度を計算してみる
1;

package Tokenizer;
use strict;
use warnings;
use Exporter;

use MeCab;

our @ISA = qw(Exporter);
our @EXPORT = qw(parse_text parse_text_with_tf);
#use Data::Dumper;
#parse
sub parse_text{
    my $line = shift;
    my @result_ary = ();
    my $m = new MeCab::Tagger("-Ochasen"); #インスタンスの作成
    my $node = $m->parseToNode("$line"); #テキストを解析

    while ($node = $node->{next}){
        my $surface = $node->{surface};
        my $feature = $node->{feature};
        #表層形,品詞,品詞細分類1,品詞細分類2,品詞細分類3,活用形,活用型,原形,読み,発音
        my @feature_meta = split (/,/,$feature);
        #my $char_type = $node->{char_type};

        #名詞のみを抽出
        if ($feature_meta[0] eq "名詞") {
            push (@result_ary, $surface);
        }
    }
    return @result_ary;
}

#テキストをパースし、tfを計算する
#IDFに関しては別の方法で計算します。もしくはしない
sub parse_text_with_tf{
    my $line = shift;
    my $terms = shift; #結果格納用
    my $m = new MeCab::Tagger("-Ochasen"); #インスタンスの作成
    my $node = $m->parseToNode("$line"); #テキストを解析
    my $N = 0;

    while ($node = $node->{next}){
        my $surface = $node->{surface};
        my $feature = $node->{feature};
        #表層形,品詞,品詞細分類1,品詞細分類2,品詞細分類3,活用形,活用型,原形,読み,発音
        my @feature_meta = split (/,/,$feature);
        #my $char_type = $node->{char_type};

        #名詞のみを抽出
        if ($feature_meta[0] eq "名詞" || $feature_meta[0] eq "形容詞" || $feature_meta[0] eq "動詞") {
        	++$N;
        	if (exists($terms->{$surface})) {
        		$terms->{$surface}++;
        	} else {
        		$terms->{$surface} = 1;
        	}
        }
    }
    return $N;
}
1;

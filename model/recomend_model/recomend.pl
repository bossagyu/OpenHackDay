use strict;
use warnings;
use TextSim;
use Tokenizer;

sub main{
    my $user_log = $ARGV[0];
    my $wikipedia = $ARGV[1];
    my %user_hash = ();

    open (my $fh1, "<", "$user_log");
    open (my $fh2, "<", "$wikipedia");
    open (my $fh3, ">",  "result.tsv");
    while (<$fh1>) {
        chomp $_;
	(my $term, my $num) = split(/\t/, $_);
        $user_hash{$term} = $num;
    }
    while (<$fh2>) {
        my %wiki_hash = ();
        my $N = 0;
        chomp $_;
        (my $title, my $abstract, my $url) = split(/\t/, $_);
        $N += Tokenizer::parse_text_with_tf($abstract, \%wiki_hash);
        map {$wiki_hash{$_} /= $N} keys %wiki_hash;
        my $sim = TextSim::calc_cossim(\%wiki_hash, \%user_hash);
        print $fh3 "$title\t$sim\t$url\n";
    }
    close($fh1);
    close($fh2);
    close($fh3);
}

main();

    
        
	
        


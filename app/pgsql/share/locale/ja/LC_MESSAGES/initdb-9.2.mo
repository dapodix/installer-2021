Þ          Ä  Ç   l	        R        Ü  
   ú       -        D  Â   Î  W     W   é    A  A   H  5     J   À       6   '  P   ^  C   ¯  :   ó  ]   .  4     B   Á  H     G   M  >     9   Ô  3     ?   B  /     -   ²  >   à  y     (     #   Â  7   æ  (     6   G  ,   ~  '   «  5   Ó  F   	  (   P  <   y  8   ¶  -   ï  -     1   K  ?   }  /   ½  =   í  /   +  "   [  6   ~  +   µ     á  0   ø  ;   )  $   e  /     &   º     á  $   ÿ  ~   $  1   £  <   Õ       3   0  8   d  (     J   Æ  Ç        Ù  C   ì  -   0  8   ^  !     ,   ¹  /   æ  4     A   K  @     R   Î  K   !      m   d   ó      X!     i!     !  [   "  %   h"     "     §"     Å"  ;   Ý"  ;   #     U#  @   æ#  ;   '$    c$  u   t%  q   ê%  f   \&  s   Ã&  &   7'     ^'  )   f'     '  &   '  0   Æ'  .   ÷'  )   &(  )   P(  "   z(  #   (  "   Á(      ä(  $   )  (   *)  "   S)     v)  "   )  !   ´)  ,   Ö)  $   *  *   (*  %   S*     y*  !   *     ´*     Î*     é*      +     %+     B+  -   ]+  0   +     ¼+     Û+     ÷+  *   ,  )   6,     `,     ,     ,  &   ,  %   º,     à,  +   ö,  !   "-     D-  e   å.  '   K/     s/     /  J   ¥/  É   ð/    º0  e   Ë1  h   12  s  2  c   4  7   r4  s   ª4     5  J   :5  _   5  b   å5  J   H6  m   6  S   7  P   U7  h   ¦7  \   8  P   l8  J   ½8  ;   9  J   D9  F   9  :   Ö9  a   :  ³   s:  F   ';  @   n;  I   ¯;  C   ù;  V   =<  I   <  7   Þ<  N   =  T   e=  H   º=  e   >  W   i>  Q   Á>  Q   ?  \   e?  F   Â?  a   	@  `   k@  G   Ì@  <   A  Q   QA  K   £A  &   ïA  G   B  \   ^B  >   »B  S   úB  G   NC  '   C  7   ¾C  µ   öC  M   ¬D  =   úD  *   8E  U   cE  O   ¹E  A   	F  j   KF  B  ¶F     ùG  b   H  E   wH  Z   ½H  <   I  Q   UI  d   §I  D   J  f   QJ  q   ¸J  m   *K  Q   K  Ù   êK     ÄL     `M  L   }M  Ó   ÊM     N  @   #O  (   dO  A   O  1   ÏO  j   P  M   lP  ¬   ºP  c   gQ  K   ËQ  U  R  ¬   mS  ¯   T  ¯   ÊT  ©   zU  0   $V     UV  X   dV  "   ½V  8   àV  A   W  1   [W  5   W  5   ÃW  7   ùW  8   1X  :   jX  +   ¥X  6   ÑX  @   Y  E   IY  1   Y  ?   ÁY  F   Z  ]   HZ  6   ¦Z  f   ÝZ  A   D[  )   [  /   °[  #   à[  /   \  1   4\  /   f\  5   \  2   Ì\  D   ÿ\  :   D]  ,   ]  )   ¬]     Ö]  A   ö]  G   8^  @   ^     Á^     Å^  >   Ü^  ?   _  ,   [_  D   _  A   Í_     n   @       C   }   E         V                 G       "          t             |   R   7   U   a           #   )           M                 S      j      :   D         x   s   4            p   Q   L       r          =         B   c   T   o   Z      w   6         z   ,       W   9       i   .   d       q      %      0                X          k       I           &   u   +          O   P       K           J   F   Y       8       f            ?   (       H   	      l   ~              {   \             ]              /   5           $            '              2   m   y      N                        g          ;   ^   -       !   e   3   _           `   1   
      [   >       A   h         v           b                 *       <    
If the data directory is not specified, the environment variable PGDATA
is used.
 
Less commonly used options:
 
Options:
 
Other options:
 
Report bugs to <pgsql-bugs@postgresql.org>.
 
Success. You can now start the database server using:

    %s%s%spostgres%s -D %s%s%s
or
    %s%s%spg_ctl%s -D %s%s%s -l logfile start

 
WARNING: enabling "trust" authentication for local connections
You can change this by editing pg_hba.conf or using the option -A, or
--auth-local and --auth-host, the next time you run initdb.
       --auth-host=METHOD    default authentication method for local TCP/IP connections
       --auth-local=METHOD   default authentication method for local-socket connections
       --lc-collate=, --lc-ctype=, --lc-messages=LOCALE
      --lc-monetary=, --lc-numeric=, --lc-time=LOCALE
                            set default locale in the respective category for
                            new databases (default taken from environment)
       --locale=LOCALE       set default locale for new databases
       --no-locale           equivalent to --locale=C
       --pwfile=FILE         read password for the new superuser from file
   %s [OPTION]... [DATADIR]
   -?, --help                show this help, then exit
   -A, --auth=METHOD         default authentication method for local connections
   -E, --encoding=ENCODING   set default encoding for new databases
   -L DIRECTORY              where to find the input files
   -T, --text-search-config=CFG
                            default text search configuration
   -U, --username=NAME       database superuser name
   -V, --version             output version information, then exit
   -W, --pwprompt            prompt for a password for the new superuser
   -X, --xlogdir=XLOGDIR     location for the transaction log directory
   -d, --debug               generate lots of debugging output
   -n, --noclean             do not clean up after errors
   -s, --show                show internal settings
  [-D, --pgdata=]DATADIR     location for this database cluster
 %s initializes a PostgreSQL database cluster.

 %s: "%s" is not a valid server encoding name
 %s: WARNING: cannot create restricted tokens on this platform
 %s: cannot be run as root
Please log in (using, e.g., "su") as the (unprivileged) user that will
own the server process.
 %s: could not access directory "%s": %s
 %s: could not access file "%s": %s
 %s: could not change permissions of directory "%s": %s
 %s: could not create directory "%s": %s
 %s: could not create restricted token: error code %lu
 %s: could not create symbolic link "%s": %s
 %s: could not execute command "%s": %s
 %s: could not find suitable encoding for locale "%s"
 %s: could not find suitable text search configuration for locale "%s"
 %s: could not get current user name: %s
 %s: could not get exit code from subprocess: error code %lu
 %s: could not obtain information about current user: %s
 %s: could not open file "%s" for reading: %s
 %s: could not open file "%s" for writing: %s
 %s: could not open process token: error code %lu
 %s: could not re-execute with restricted token: error code %lu
 %s: could not read password from file "%s": %s
 %s: could not start process for command "%s": error code %lu
 %s: could not to allocate SIDs: error code %lu
 %s: could not write file "%s": %s
 %s: data directory "%s" not removed at user's request
 %s: directory "%s" exists but is not empty
 %s: encoding mismatch
 %s: failed to remove contents of data directory
 %s: failed to remove contents of transaction log directory
 %s: failed to remove data directory
 %s: failed to remove transaction log directory
 %s: failed to restore old locale "%s"
 %s: file "%s" does not exist
 %s: file "%s" is not a regular file
 %s: input file "%s" does not belong to PostgreSQL %s
Check your installation or specify the correct path using the option -L.
 %s: input file location must be an absolute path
 %s: invalid authentication method "%s" for "%s" connections
 %s: invalid locale name "%s"
 %s: locale "%s" requires unsupported encoding "%s"
 %s: locale name has non-ASCII characters, skipped: "%s"
 %s: locale name too long, skipped: "%s"
 %s: must specify a password for the superuser to enable %s authentication
 %s: no data directory specified
You must identify the directory where the data for this database system
will reside.  Do this with either the invocation option -D or the
environment variable PGDATA.
 %s: out of memory
 %s: password prompt and password file cannot be specified together
 %s: removing contents of data directory "%s"
 %s: removing contents of transaction log directory "%s"
 %s: removing data directory "%s"
 %s: removing transaction log directory "%s"
 %s: symlinks are not supported on this platform %s: too many command-line arguments (first is "%s")
 %s: transaction log directory "%s" not removed at user's request
 %s: transaction log directory location must be an absolute path
 %s: warning: specified text search configuration "%s" might not match locale "%s"
 %s: warning: suitable text search configuration for locale "%s" is unknown
 Encoding "%s" implied by locale is not allowed as a server-side encoding.
The default database encoding will be set to "%s" instead.
 Encoding "%s" is not allowed as a server-side encoding.
Rerun %s with a different locale selection.
 Enter it again:  Enter new superuser password:  If you want to create a new database system, either remove or empty
the directory "%s" or run %s
with an argument other than "%s".
 If you want to store the transaction log there, either
remove or empty the directory "%s".
 No usable system locales were found.
 Passwords didn't match.
 Rerun %s with the -E option.
 Running in debug mode.
 Running in noclean mode.  Mistakes will not be cleaned up.
 The database cluster will be initialized with locale "%s".
 The database cluster will be initialized with locales
  COLLATE:  %s
  CTYPE:    %s
  MESSAGES: %s
  MONETARY: %s
  NUMERIC:  %s
  TIME:     %s
 The default database encoding has accordingly been set to "%s".
 The default text search configuration will be set to "%s".
 The encoding you selected (%s) and the encoding that the
selected locale uses (%s) do not match.  This would lead to
misbehavior in various character string processing functions.
Rerun %s and either do not specify an encoding explicitly,
or choose a matching combination.
 The files belonging to this database system will be owned by user "%s".
This user must also own the server process.

 The program "postgres" is needed by %s but was not found in the
same directory as "%s".
Check your installation.
 The program "postgres" was found by "%s"
but was not the same version as %s.
Check your installation.
 This might mean you have a corrupted installation or identified
the wrong directory with the invocation option -L.
 Try "%s --help" for more information.
 Usage:
 Use the option "--debug" to see details.
 caught signal
 child process exited with exit code %d child process exited with unrecognized status %d child process was terminated by exception 0x%X child process was terminated by signal %d child process was terminated by signal %s copying template1 to postgres ...  copying template1 to template0 ...  could not change directory to "%s" could not find a "%s" to execute could not get junction for "%s": %s
 could not identify current directory: %s could not open directory "%s": %s
 could not read binary "%s" could not read directory "%s": %s
 could not read symbolic link "%s" could not remove file or directory "%s": %s
 could not set junction for "%s": %s
 could not stat file or directory "%s": %s
 could not write to child process: %s
 creating collations ...  creating configuration files ...  creating conversions ...  creating dictionaries ...  creating directory %s ...  creating information schema ...  creating subdirectories ...  creating system views ...  creating template1 database in %s/base/1 ...  fixing permissions on existing directory %s ...  initializing dependencies ...  initializing pg_authid ...  invalid binary "%s" loading PL/pgSQL server-side language ...  loading system objects' descriptions ...  not supported on this platform
 ok
 out of memory
 selecting default max_connections ...  selecting default shared_buffers ...  setting password ...  setting privileges on built-in objects ...  vacuuming database template1 ...  Project-Id-Version: PostgreSQL 9.0.0rc1
Report-Msgid-Bugs-To: pgsql-bugs@postgresql.org
POT-Creation-Date: 2012-08-11 11:13+0900
PO-Revision-Date: 2012-08-11 11:41+0900
Last-Translator: HOTTA Michihide <hotta@net-newbie.com>
Language-Team: jpug-doc <jpug-doc@ml.postgresql.jp>
Language: ja
MIME-Version: 1.0
Content-Type: text/plain; charset=UTF-8
Content-Transfer-Encoding: 8bit
Plural-Forms: nplurals=1; plural=0;
 
ãã¼ã¿ãã£ã¬ã¯ããªãæå®ãããªãå ´åãPGDATAç°å¢å¤æ°ãä½¿ç¨ããã¾ãã
 
ä½¿ç¨é »åº¦ã®ä½ããªãã·ã§ã³:
 
ãªãã·ã§ã³:
 
ãã®ä»ã®ãªãã·ã§ã³:
 
ä¸å·åã¯<pgsql-bugs@postgresql.org>ã¾ã§å ±åãã¦ãã ããã
 
æåãã¾ãããä»¥ä¸ãä½¿ç¨ãã¦ãã¼ã¿ãã¼ã¹ãµã¼ããèµ·åãããã¨ãã§ãã¾ãã

    %s%s%spostmaster%s -D %s%s%s
ã¾ãã¯
    %s%s%spg_ctl%s -D %s%s%s -l logfile start

 
è­¦å: ã­ã¼ã«ã«æ¥ç¶åãã«"trust"èªè¨¼ãæå¹ã§ãã
pg_hba.confãç·¨éããããããã¯ãæ¬¡åinitdbãå®è¡ããæã«-Aãªãã·ã§
ã³ãã¾ãã¯ã--auth-localããã³--auth-hostãä½¿ç¨ãããã¨ã§å¤æ´ããã
ã¨ãã§ãã¾ãã
       --auth-host=METHOD    ã­ã¼ã«ã«ãªTCP/IPæ¥ç¶åãã®ããã©ã«ãã®èªè¨¼æ¹å¼ã§ã
       --auth-host=METHOD    ã­ã¼ã«ã«ã½ã±ããæ¥ç¶åãã®ããã©ã«ãã®èªè¨¼æ¹å¼ã§ã
       --lc-collate, --lc-ctype, --lc-messages=ã­ã±ã¼ã«å
      --lc-monetary, --lc-numeric, --lc-time=ã­ã±ã¼ã«å
                            æ°ãããã¼ã¿ãã¼ã¹ã«å¯¾å¿ããã«ãã´ãªã«å¯¾ãã
                            ããã©ã«ãã­ã±ã¼ã«ãã»ãã(ããã©ã«ãå¤ã¯
                            ç°å¢å¤æ°ããé¸ã°ãã¾ã)
       --locale=LOCALE        æ°ãããã¼ã¿ãã¼ã¹ã®ããã©ã«ãã­ã±ã¼ã«ãã»ãã
       --no-locale           --locale=C ã¨åãã§ã
       --pwfile=ãã¡ã¤ã«å   æ°ããã¹ã¼ãã¼ã¦ã¼ã¶ã®ãã¹ã¯ã¼ãããã¡ã¤ã«ããèª­ã¿è¾¼ã
   %s [OPTION]... [DATADIR]
   -?, --help                ãã®ãã«ããè¡¨ç¤ºããçµäºãã¾ã
   -A, --auth=METHOD         ã­ã¼ã«ã«ãªæ¥ç¶åãã®ããã©ã«ãã®èªè¨¼æ¹å¼ã§ã
   -E, --encoding=ENCODING   æ°è¦ãã¼ã¿ãã¼ã¹ç¨ã®ããã©ã«ãã®ç¬¦å·åæ¹å¼ã§ã
   -L DIRECTORY              å¥åãã¡ã¤ã«ã®å ´æãæå®ãã¾ã
   -T, --text-search-config=CFG\
                            ããã©ã«ãã®ãã­ã¹ãæ¤ç´¢è¨­å®ã§ã
   -U, --username=NAME       ãã¼ã¿ãã¼ã¹ã¹ã¼ãã¼ã¦ã¼ã¶ã®ååã§ã
   -V, --version             ãã¼ã¸ã§ã³æå ±ãè¡¨ç¤ºããçµäºãã¾ã
   -W, --pwprompt            æ°è¦ã¹ã¼ãã¼ã¦ã¼ã¶ã«å¯¾ãã¦ãã¹ã¯ã¼ãå¥åãä¿ãã¾ã
   -X, --xlogdir=XLOGDIR     ãã©ã³ã¶ã¯ã·ã§ã³ã­ã°ãã£ã¬ã¯ããªã®å ´æã§ã
   -d, --debug               å¤ãã®ãããã°ç¨ã®åºåãçæãã¾ã
   -n, --noclean             ã¨ã©ã¼çºçå¾ã®åé¤ãè¡ãã¾ãã
   -s, --show                åé¨è¨­å®ãè¡¨ç¤ºãã¾ã
  [-D, --pgdata=]DATADIR     ãã¼ã¿ãã¼ã¹ã¯ã©ã¹ã¿ã®å ´æã§ã
 %sã¯PostgreSQLãã¼ã¿ãã¼ã¹ã¯ã©ã¹ã¿ãåæåãã¾ãã
 %s: "%s" ã¯ç¡å¹ãªãµã¼ãç¬¦å·åæ¹å¼åã§ãã
 %s: è­¦å: ãã®ãã©ãããã©ã¼ã ã§ã¯å¶éä»ããã¼ã¯ã³ãä½æã§ãã¾ãã
 %s: ã«ã¼ãã§ã¯å®è¡ã§ãã¾ããã
ãµã¼ããã­ã»ã¹ã®ææèã¨ãªã(éç¹æ¨©)ã¦ã¼ã¶ã¨ãã¦(ä¾ãã°"su"ãä½¿ç¨ãã¦)ã­ã°ã¤ã³ãã¦ãã ããã
 %s: ãã£ã¬ã¯ããª"%s"ã«ã¢ã¯ã»ã¹ã§ãã¾ããã§ãã: %s
 %s: ãã¡ã¤ã«"%s"ã«ã¢ã¯ã»ã¹ã§ãã¾ããã§ãã: %s
 %s: ãã£ã¬ã¯ããª"%s"ã®æ¨©éãå¤æ´ã§ãã¾ããã§ãã: %s
 %s: ãã£ã¬ã¯ããª"%s"ãä½æã§ãã¾ããã§ããã: %s
 %s: å¶éä»ããã¼ã¯ã³ãä½æã§ãã¾ããã§ãã: ã¨ã©ã¼ã³ã¼ã %lu
 %s: ã·ã³ããªãã¯ãªã³ã¯"%s"ãä½æã§ãã¾ããã§ãã: %s
 %s: ã³ãã³ã"%s"ã®å®å¹ã«å¤±æãã¾ãã: %s
 %s: ã­ã±ã¼ã«"%s"ç¨ã«é©åãªç¬¦å·åæ¹å¼ãããã¾ããã§ãã
 %s: ã­ã±ã¼ã«"%s"ç¨ã®é©åãªãã­ã¹ãæ¤ç´¢è¨­å®ãè¦ã¤ããã¾ãã
 %s: ç¾å¨ã®ã¦ã¼ã¶åãå¾ããã¨ãã§ãã¾ããã§ãã: %s
 %s: ãµããã­ã»ã¹ã®çµäºã³ã¼ããå¥æã§ãã¾ããã§ããã: ã¨ã©ã¼ã³ã¼ã %lu
 %s: ç¾å¨ã®ã¦ã¼ã¶ã«é¢ããæå ±ãå¾ããã¨ãã§ãã¾ããã§ãã: %s
 %s: èª­ã¿åãç¨ã®ãã¡ã¤ã«"%s"ããªã¼ãã³ã§ãã¾ããã§ãã:%s
 %s:æ¸ãè¾¼ã¿ç¨ã®ãã¡ã¤ã«"%s"ããªã¼ãã³ã§ãã¾ããã§ãã: %s
 %s: ãã­ã»ã¹ãã¼ã¯ã³ããªã¼ãã³ã§ãã¾ããã§ãã: ã¨ã©ã¼ã³ã¼ã %lu
 %s: å¶éä»ããã¼ã¯ã³ã§åå®è¡ã§ãã¾ããã§ãã: %lu
 %s: ãã¡ã¤ã«"%s"ãããã¹ã¯ã¼ããèª­ã¿åããã¨ãã§ãã¾ããã§ããã: %s
 %s: "%s"ã³ãã³ãç¨ã®ãã­ã»ã¹ãèµ·åã§ãã¾ããã§ãã: ã¨ã©ã¼ã³ã¼ã %lu
 %s: SIDãå²ãå½ã¦ããã¾ããã§ãã: ã¨ã©ã¼ã³ã¼ã %lu
 %s:ãã¡ã¤ã«"%s"ã®æ¸ãè¾¼ã¿ã«å¤±æãã¾ãã: %s
 %s: ã¦ã¼ã¶ãè¦æ±ãããã¼ã¿ãã£ã¬ã¯ããª"%s"ãåé¤ãã¾ãã
 %s: ãã£ã¬ã¯ããª"%s"ã¯å­å¨ãã¾ãããç©ºã§ã¯ããã¾ãã
 %s: ç¬¦å·åæ¹å¼ãåãã¾ãã
 %s: ãã¼ã¿ãã£ã¬ã¯ããªã®åå®¹ã®åé¤ã«å¤±æãã¾ãã
 %s: ãã©ã³ã¶ã¯ã·ã§ã³ã­ã°ãã£ã¬ã¯ããªã®åå®¹ã®åé¤ã«å¤±æãã¾ãã
 %s: ãã¼ã¿ãã£ã¬ã¯ããªã®åé¤ã«å¤±æãã¾ãã
 %s: ãã©ã³ã¶ã¯ã·ã§ã³ã­ã°ãã£ã¬ã¯ããªã®åé¤ã«å¤±æãã¾ãã
 %s:å¤ãã­ã±ã¼ã«"%s"ãæ»ããã¨ãã§ãã¾ããã§ããã
 %s: ãã¡ã¤ã«"%s"ãããã¾ãã
 %s: "%s" ã¯éå¸¸ã®ãã¡ã¤ã«ã§ã¯ããã¾ãã
 %s: å¥åãã¡ã¤ã«"%s"ãPostgreSQL %sã«ããã¾ãã
ã¤ã³ã¹ãã¬ã¼ã·ã§ã³ãæ¤æ»ãã-Lãªãã·ã§ã³ãä½¿ç¨ãã¦æ­£ãããã¹ãæå®ãã¦ãã ããã
 %s: å¥åãã¡ã¤ã«ã®å ´æã¯çµ¶å¯¾ãã¹ã§ãªããã°ãªãã¾ãã
 %1$s: "%3$s"æ¥ç¶ã§ã¯èªè¨¼æ¹å¼"%2$s"ã¯ç¡å¹ã§ãã
 %s: ã­ã±ã¼ã«å"%s"ã¯ç¡å¹ã§ãã
 %s: ã­ã±ã¼ã«"%s"ã¯ãµãã¼ãããªãç¬¦å·åæ¹å¼"%s"ãå¿è¦ã¨ãã¾ã
 %s: ã­ã±ã¼ã«åã«éASCIIæå­ãããã¾ãã®ã§é£ã°ãã¾ã: "%s"
 %s: ã­ã±ã¼ã«åãé·éãã¾ãã®ã§é£ã°ãã¾ã: "%s"
 %s: %sèªè¨¼ãæå¹ã«ããããã«ã¹ã¼ãã¼ã¦ã¼ã¶ã®ãã¹ã¯ã¼ããæå®ãã¦ãã ãã
 %s: ãã¼ã¿ãã£ã¬ã¯ããªãæå®ããã¦ãã¾ãã
ãã¼ã¿ãã¼ã¹ã·ã¹ãã ç¨ã®ãã¼ã¿ãæ ¼ç´ãããã£ã¬ã¯ããªãæå®ããªããã°ãªã
ã¾ããã-Dãªãã·ã§ã³ãä»ãã¦å¼ã³åºãããããã¯ãPGDATAç°å¢å¤æ°ãä½¿ç¨ãã
ãã¨ã§æå®ãããã¨ãã§ãã¾ãã
 %s: ã¡ã¢ãªä¸è¶³ã§ã
 %s: ãã¹ã¯ã¼ããã­ã³ããã¨ãã¹ã¯ã¼ããã¡ã¤ã«ã¯åæã«æå®ã§ãã¾ãã
 %s: ãã¼ã¿ãã£ã¬ã¯ããª"%s"ã®åå®¹ãåé¤ãã¦ãã¾ã
 %s: ãã©ã³ã¶ã¯ã·ã§ã³ã­ã°ãã£ã¬ã¯ããª"%s"ã®åå®¹ãåé¤ãã¦ãã¾ã
 %s: ãã¼ã¿ãã£ã¬ã¯ããª"%s"ãåé¤ãã¦ãã¾ã
 %s: ãã©ã³ã¶ã¯ã·ã§ã³ã­ã°ãã£ã¬ã¯ããª"%s"ãåé¤ãã¦ãã¾ã
 %s: ãã®ãã©ãããã©ã¼ã ã§ã·ã³ããªãã¯ãªã³ã¯ã¯ãµãã¼ãããã¦ãã¾ãã %s: ã³ãã³ãã©ã¤ã³å¼æ°ãå¤ããã¾ãã(å§ãã¯"%s")
 %s: ã¦ã¼ã¶ãè¦æ±ãããã©ã³ã¶ã¯ã·ã§ã³ã­ã°ãã£ã¬ã¯ããª"%s"ãåé¤ãã¾ãã
 %s: ãã©ã³ã¶ã¯ã·ã§ã³ã­ã°ã®ãã£ã¬ã¯ããªã®ä½ç½®ã¯ãçµ¶å¯¾ãã¹ã§ãªããã°ãªãã¾ãã
 %s:è­¦å:æå®ãããã­ã¹ãæ¤ç´¢è¨­å®"%s"ãã­ã±ã¼ã«"%s"ã«åããªãå¯è½æ§ãããã¾ã
 %s:è­¦å:ã­ã±ã¼ã«"%s"ã«é©ãããã­ã¹ãæ¤ç´¢è¨­å®ãä¸æã§ãã
 ã­ã±ã¼ã«ã«ããæç¤ºãããç¬¦å·åæ¹å¼"%s"ã¯ãµã¼ãå´ã®ç¬¦å·åæ¹å¼ã¨ãã¦ä½¿ç¨ã§ãã¾ããã
ããã©ã«ãã®ãã¼ã¿ãã¼ã¹ç¬¦å·åæ¹å¼ã¯ä»£ããã«"%s"ã«è¨­å®ããã¾ãã
 ç¬¦å·åæ¹å¼"%s"ã¯ãµã¼ãå´ã®ç¬¦å·åæ¹å¼ã¨ãã¦ä½¿ç¨ã§ãã¾ããã
å¥ã®ã­ã±ã¼ã«ãé¸æãã¦%sãåå®è¡ãã¦ãã ããã
 åå¥åãã¦ãã ãã: æ°ããã¹ã¼ãã¼ã¦ã¼ã¶ã®ãã¹ã¯ã¼ããå¥åãã¦ãã ãã: æ°è¦ã«ãã¼ã¿ãã¼ã¹ã·ã¹ãã ãä½æãããã®ã§ããã°ããã£ã¬ã¯ããª"%s"
ãåé¤ãããç©ºã«ãã¦ãã ãããã¾ãã¯ã%sã"%s"ä»¥å¤ã®å¼æ°ã§å®è¡ãã¦
ãã ããã
 ããã«ãã©ã³ã¶ã¯ã·ã§ã³ã­ã°ãæ ¼ç´ãããå ´åã¯ãã£ã¬ã¯ããª"%s"ãåé¤ããã
ç©ºã«ãã¦ãã ãã
 ä½¿ç¨ã§ããã·ã¹ãã ã­ã±ã¼ã«ãè¦ã¤ããã¾ãã
 ãã¹ã¯ã¼ããä¸è´ãã¾ããã
 -Eãªãã·ã§ã³ãä»ãã¦%sãåå®è¡ãã¦ãã ããã
 ãããã°ã¢ã¼ãã§å®è¡ãã¦ãã¾ãã
 åé¤ãè¡ããªãã¢ã¼ãã§å®è¡ãã¦ãã¾ããå¤±æããå ´åã§ãåé¤ããã¾ããã
 ãã¼ã¿ãã¼ã¹ã¯ã©ã¹ã¿ã¯ã­ã±ã¼ã«"%s"ã§åæåããã¾ãã
 ãã¼ã¿ãã¼ã¹ã¯ã©ã¹ã¿ã¯ä»¥ä¸ã®ã­ã±ã¼ã«ã§åæåããã¾ãã
  COLLATE:  %s
  CTYPE:    %s
  MESSAGES: %s
  MONETARY: %s
  NUMERIC:  %s
  TIME:     %s
 ãããã£ã¦ããã©ã«ãã®ãã¼ã¿ãã¼ã¹ç¬¦å·åæ¹å¼ã¯%sã«è¨­å®ããã¾ããã
 ããã©ã«ãã®ãã­ã¹ãæ¤ç´¢è¨­å®ã¯%sã«è¨­å®ããã¾ããã
 é¸æããç¬¦å·åæ¹å¼(%s)ã¨é¸æããã­ã±ã¼ã«ãä½¿ç¨ããç¬¦å·åæ¹å¼(%s)ã
åãã¾ãããããã«ããåç¨®ã®æå­åå¦çé¢æ°ãä¸æ­£ãªåä½ãããå¯è½æ§ã
ããã¾ããæç¤ºçãªç¬¦å·åæ¹å¼ã®æå®ãæ­¢ãããåè´ããçµã¿åããã
é¸æãã¦%sãåå®è¡ãã¦ãã ãã
 ãã¼ã¿ãã¼ã¹ã·ã¹ãã åã®ãã¡ã¤ã«ã®ææèã¯"%s"ã¦ã¼ã¶ã§ããã
ãã®ã¦ã¼ã¶ããµã¼ããã­ã»ã¹ãææããªããã°ãªãã¾ããã

 %sã§ã¯"postgres"ãã­ã°ã©ã ãå¿è¦ã§ããã"%s"ã¨åããã£ã¬ã¯ããªã«ãã
ã¾ããã§ããã
ã¤ã³ã¹ãã¬ã¼ã·ã§ã³ãæ¤æ»ãã¦ãã ããã
 "postgres"ãã­ã°ã©ã ã¯"%s"ã«ããã¾ãããã%sã¨åããã¼ã¸ã§ã³ã§
ã¯ããã¾ããã§ããã
ã¤ã³ã¹ãã¬ã¼ã·ã§ã³ãæ¤æ»ãã¦ãã ããã
 ã¤ã³ã¹ãã¬ã¼ã·ã§ã³ãç ´æãã¦ããã-Lãªãã·ã§ã³ã§æå®ãããã£
ã¬ã¯ããªãééã£ã¦ããããæå³ããå¯è½æ§ãããã¾ãã
 è©³ç´°ã¯"%s --help"ãè¡ã£ã¦ãã ããã
 ä½¿ç¨æ¹æ³:
 è©³ç´°ãç¢ºèªããããã«ã¯"--debug"ãªãã·ã§ã³ãä½¿ç¨ãã¦ãã ããã
 ã·ã°ãã«ãçºçãã¾ãã
 å­ãã­ã»ã¹ãçµäºã³ã¼ã%dã§çµäºãã¾ãã å­ãã­ã»ã¹ãæªç¥ã®ã¹ãã¼ã¿ã¹%dã§çµäºãã¾ãã å­ãã­ã»ã¹ãä¾å¤0x%Xã§çµäºãã¾ãã å­ãã­ã»ã¹ãã·ã°ãã«%dã§çµäºãã¾ãã å­ãã­ã»ã¹ãã·ã°ãã«%sã§çµäºãã¾ãã template1ããpostgresã¸ã³ãã¼ãã¦ãã¾ã ...  template1ããtemplate0ã¸ã³ãã¼ãã¦ãã¾ã ...  ãã£ã¬ã¯ããªã"%s"ã«å¤æ´ã§ãã¾ããã§ãã å®è¡ãã"%s"ãããã¾ããã§ãã "%s"ã®junctionãå¥æã§ãã¾ããã§ãã:  %s
 ç¾å¨ã®ãã£ã¬ã¯ããªãè­å¥ã§ãã¾ããã§ãã: %s ãã£ã¬ã¯ããª"%s"ããªã¼ãã³ã§ãã¾ããã§ããã: %s
 ãã¤ããª"%s"ãèª­ã¿åãã¾ããã§ãã ãã£ã¬ã¯ããª"%s"ãèª­ã¿åãã¾ããã§ããã: %s
 ã·ã³ããªãã¯ãªã³ã¯"%s"ãèª­ã¿åãã§ãã¾ããã§ãã "%s"ã¨ãããã¡ã¤ã«ã¾ãã¯ãã£ã¬ã¯ããªãåé¤ã§ãã¾ããã§ããã: %s
 "%s"ã®junctionãè¨­å®ã§ãã¾ããã§ãã:  %s
 "%s"ã¨ãããã¡ã¤ã«ã¾ãã¯ãã£ã¬ã¯ããªã®æå ±ãåå¾ã§ãã¾ããã§ããã: %s
 å­ãã­ã»ã¹ã¸ã®æ¸ãè¾¼ã¿ãã§ãã¾ããã§ãã: %s
 ç§åé åºãä½æãã¦ãã¾ã ...  è¨­å®ãã¡ã¤ã«ãä½æãã¦ãã¾ã ...  å¤æãä½æãã¦ãã¾ã ...  ãã£ã¬ã¯ããªãä½æãã¦ãã¾ã ...  ãã£ã¬ã¯ããª%sãä½æãã¦ãã¾ã ...  æå ±ã¹ã­ã¼ããä½æãã¦ãã¾ã ...  ãµããã£ã¬ã¯ããªãä½æãã¦ãã¾ã ...  ã·ã¹ãã ãã¥ã¼ãä½æãã¦ãã¾ã ...  %s/base/1ã«template1ãã¼ã¿ãã¼ã¹ãä½æãã¦ãã¾ã ...  ãã£ã¬ã¯ããª%sã®æ¨©éãè¨­å®ãã¦ãã¾ã ...  ä¾å­é¢ä¿ãåæåãã¦ãã¾ã ...  pg_authidãåæåãã¦ãã¾ã ...  ãã¤ããª"%s"ã¯ç¡å¹ã§ã PL/pgSQL ãµã¼ããµã¤ãè¨èªãã­ã¼ããã¦ãã¾ã ...  ã·ã¹ãã ãªãã¸ã§ã¯ãã®å®ç¾©ãã­ã¼ããã¦ãã¾ã ...  ãã®ãã©ãããã©ã¼ã ã§ã¯ãµãã¼ãããã¾ãã
 ok
 ã¡ã¢ãªä¸è¶³ã§ã
 ããã©ã«ãã®max_connectionsãé¸æãã¦ãã¾ã ...  ããã©ã«ãã® shared_buffers ãé¸æãã¦ãã¾ã ...  ãã¹ã¯ã¼ããè¨­å®ãã¦ãã¾ã ...  çµã¿è¾¼ã¿ãªãã¸ã§ã¯ãã«æ¨©éãè¨­å®ãã¦ãã¾ã ...  template1ãã¼ã¿ãã¼ã¹ããã­ã¥ã¼ã ãã¦ãã¾ã ...  
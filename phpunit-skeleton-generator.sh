for pf in $(find src -name '*.php')
do
    echo "# test for $pf" 

    grep '^class' $pf > /dev/null 2>&1

    if [ $? -eq 0 ]
       then
       tf=$(basename $pf | sed -e s/.php/Test.php.skelgen/g)
       dn=$(dirname $pf | sed -e s:src:tests/Unit:g)
       ns=$(grep '^namespace' $pf | cut -f2 -d ' ' | sed -e s/\;//g)
       cl=$(grep '^class' $pf | cut -f2 -d ' ')
       tc=$(echo $ns | cut -f1-2 -d '\')

       echo mkdir -p $dn
       if [ ! -f "$dn/$tf" ]
       then
           echo phpunit-skelgen-ns generate-test --bootstrap tests/Resources/bootstrap.php \'${ns}\\${cl}\' ${pf} ${dn}/${tf}
       fi
       echo
    fi
done

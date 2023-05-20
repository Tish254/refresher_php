# Restore pacman in Git for Windows
## Run git bash as administrator
### Note => Make sure the binary reflect what package version are in "https://https://repo.msys2.org/msys/x86_64/"

# 1. Run the following commands to download /etc/pacman.conf and 3 packages: pacman, pacman-mirrors and msys2-keyring.

curl https://raw.githubusercontent.com/msys2/MSYS2-packages/7858ee9c236402adf569ac7cff6beb1f883ab67c/pacman/pacman.conf -o /etc/pacman.conf
for f in pacman-6.0.0-5-x86_64 pacman-mirrors-20210706-1-any msys2-keyring-1~20210213-2-any;
 do curl https://repo.msys2.org/msys/x86_64/$f.pkg.tar.zst -o ~/Downloads/$f.pkg.tar.zst;
done

# 2.Unpack them at the root then restore pacman with these commands
cd /
tar x --zst -vf ~/Downloads/msys2-keyring-1~20210213-2-any.pkg.tar.zst usr
tar x --zst -vf ~/Downloads/pacman-mirrors-20210706-1-any.pkg.tar.zst etc
tar x --zst -vf ~/

# 3. Restore matching metadata

URL=https://github.com/git-for-windows/git-sdk-64/raw/main
cat /etc/package-versions.txt | while read p v; do d=/var/lib/pacman/local/$p-$v;
 mkdir -p $d; echo $d; for f in desc files install mtree; do curl -sSL "$URL$d/$f" -o $d/$f;
 done; done/pacman-6.0.0-5-x86_64.pkg.tar.zst usr
mkdir -p /var/lib/pacman
pacman-key --init
pacman-key --populate msys2
pacman -Syu


URL=https://github.com/git-for-windows/git-sdk-64/raw/main
cat /etc/package-versions.txt | while read p v; do d=/var/lib/pacman/local/$p-$v;
 mkdir -p $d; echo $d; for f in desc files install mtree; do curl -sSL "$URL$d/$f" -o $d/$f;
 done; done


 # 4 REfresh pacman keys to avoid Invalid signature, corrupt database
pacman-key --refresh-keys

 # 5 Install zsh!
 pacman -S zsh

 # 6 Add the following line to .bashrc to switch from git bash to zsh whenever executing git bash.

 bash -c zsh